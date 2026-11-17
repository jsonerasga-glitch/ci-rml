/*
 * RML CMS – Administrative KPI dashboard.
 * Loads one JSON payload from KpiController::data() and computes every KPI in
 * the browser, so filters re-render without another request.
 * Charts use the locally bundled Plotly (footer-essential).
 */
(function () {
  'use strict';

  // ---------------------------------------------------------------- constants
  var C = {
    s1: '#2a78d6', s2: '#eb6834', s3: '#1baf7a', s4: '#eda100',
    good: '#0f7b3a', warn: '#c98500', crit: '#b42318', neutral: '#b9bec9',
    text: '#0b0b0b', text2: '#52514e', grid: '#eceff4'
  };
  var DAY = 86400000;
  var SETTINGS_KEY = 'rmlKpiSettings.v1';
  var DEFAULT_PERIOD = 10;
  var DEFAULT_HOLIDAYS = [
    // Philippine regular holidays – edit in Settings.
    '2024-01-01', '2024-03-28', '2024-03-29', '2024-04-09', '2024-05-01', '2024-06-12', '2024-08-26', '2024-11-30', '2024-12-25', '2024-12-30',
    '2025-01-01', '2025-04-09', '2025-04-17', '2025-04-18', '2025-05-01', '2025-06-12', '2025-08-25', '2025-11-30', '2025-12-25', '2025-12-30',
    '2026-01-01', '2026-04-02', '2026-04-03', '2026-04-09', '2026-05-01', '2026-06-12', '2026-08-31', '2026-11-30', '2026-12-25', '2026-12-30'
  ];

  // Province detection: longest names first so "Quezon City" wins over "Quezon".
  var NCR = ['Quezon City', 'Manila', 'Makati', 'Pasig', 'Taguig', 'Mandaluyong', 'Pasay', 'Paranaque', 'Parañaque', 'Las Pinas', 'Las Piñas',
    'Muntinlupa', 'Marikina', 'Caloocan', 'Valenzuela', 'Malabon', 'Navotas', 'San Juan City', 'Pateros', 'Metro Manila', 'NCR'];
  var CITY_TO_PROVINCE = {
    'Los Banos': 'Laguna', 'Los Baños': 'Laguna', 'Calamba': 'Laguna', 'Santa Rosa': 'Laguna', 'Sta. Rosa': 'Laguna', 'Binan': 'Laguna', 'Biñan': 'Laguna',
    'San Pedro': 'Laguna', 'Cabuyao': 'Laguna', 'San Pablo': 'Laguna', 'Sta. Cruz': 'Laguna', 'Santa Cruz': 'Laguna', 'UPLB': 'Laguna',
    'Lipa': 'Batangas', 'Tanauan': 'Batangas', 'Sto. Tomas': 'Batangas', 'Santo Tomas': 'Batangas', 'Malvar': 'Batangas',
    'Tagaytay': 'Cavite', 'Dasmarinas': 'Cavite', 'Dasmariñas': 'Cavite', 'Imus': 'Cavite', 'Bacoor': 'Cavite', 'General Trias': 'Cavite', 'Carmona': 'Cavite', 'Rosario': 'Cavite', 'Silang': 'Cavite',
    'Antipolo': 'Rizal', 'Cainta': 'Rizal', 'Taytay': 'Rizal', 'Lucena': 'Quezon', 'Tayabas': 'Quezon',
    'Calapan': 'Oriental Mindoro', 'Puerto Princesa': 'Palawan', 'Baguio': 'Benguet', 'Cebu City': 'Cebu', 'Davao City': 'Davao del Sur',
    'Angeles': 'Pampanga', 'San Fernando, Pampanga': 'Pampanga', 'Clark': 'Pampanga', 'Malolos': 'Bulacan', 'Meycauayan': 'Bulacan'
  };
  var PROVINCES = ['Abra', 'Agusan del Norte', 'Agusan del Sur', 'Aklan', 'Albay', 'Antique', 'Apayao', 'Aurora', 'Basilan', 'Bataan', 'Batanes', 'Batangas',
    'Benguet', 'Biliran', 'Bohol', 'Bukidnon', 'Bulacan', 'Cagayan', 'Camarines Norte', 'Camarines Sur', 'Camiguin', 'Capiz', 'Catanduanes', 'Cavite', 'Cebu',
    'Cotabato', 'Davao de Oro', 'Davao del Norte', 'Davao del Sur', 'Davao Occidental', 'Davao Oriental', 'Dinagat Islands', 'Eastern Samar', 'Guimaras',
    'Ifugao', 'Ilocos Norte', 'Ilocos Sur', 'Iloilo', 'Isabela', 'Kalinga', 'La Union', 'Laguna', 'Lanao del Norte', 'Lanao del Sur', 'Leyte', 'Maguindanao',
    'Marinduque', 'Masbate', 'Misamis Occidental', 'Misamis Oriental', 'Mountain Province', 'Negros Occidental', 'Negros Oriental', 'Northern Samar',
    'Nueva Ecija', 'Nueva Vizcaya', 'Occidental Mindoro', 'Oriental Mindoro', 'Palawan', 'Pampanga', 'Pangasinan', 'Quezon', 'Quirino', 'Rizal', 'Romblon',
    'Samar', 'Sarangani', 'Siquijor', 'Sorsogon', 'South Cotabato', 'Southern Leyte', 'Sultan Kudarat', 'Sulu', 'Surigao del Norte', 'Surigao del Sur',
    'Tarlac', 'Tawi-Tawi', 'Zambales', 'Zamboanga del Norte', 'Zamboanga del Sur', 'Zamboanga Sibugay'];
  var PLACE_MATCHERS = (function () {
    var list = [];
    NCR.forEach(function (n) { list.push([n, 'Metro Manila']); });
    Object.keys(CITY_TO_PROVINCE).forEach(function (n) { list.push([n, CITY_TO_PROVINCE[n]]); });
    PROVINCES.forEach(function (n) { list.push([n, n]); });
    list.sort(function (a, b) { return b[0].length - a[0].length; });
    return list.map(function (p) {
      var esc = p[0].replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
      return [new RegExp('(^|[^a-z])' + esc + '($|[^a-z])', 'i'), p[1]];
    });
  })();

  // -------------------------------------------------------------------- state
  var RAW = null, MODULES = {}, settings = loadSettings(), holidaySet = {};
  var ui = { tat: 'month', vol: 'month', aging: 'all', work: 'officer', due: '30', std: 'attention' };

  // ------------------------------------------------------------------ helpers
  function $(id) { return document.getElementById(id); }
  function esc(s) { return String(s == null ? '' : s).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; }); }
  function parseD(s) { if (!s) return null; var p = s.slice(0, 10).split('-'); return new Date(+p[0], +p[1] - 1, +p[2]); }
  function iso(d) { return d.getFullYear() + '-' + String(d.getMonth() + 1).padStart(2, '0') + '-' + String(d.getDate()).padStart(2, '0'); }
  function today() { var d = new Date(); return new Date(d.getFullYear(), d.getMonth(), d.getDate()); }
  function monthKey(s) { return s.slice(0, 7); }
  function monthLabel(k) { var p = k.split('-'); return new Date(+p[0], +p[1] - 1, 1).toLocaleString('en', { month: 'short', year: 'numeric' }); }
  function fmt(n, dp) { return n == null || isNaN(n) ? '–' : Number(n).toFixed(dp == null ? 1 : dp).replace(/\.0+$/, ''); }
  function pct(a, b) { return b ? (100 * a / b) : null; }
  function fmtPct(v) { return v == null ? '–' : v.toFixed(1) + '%'; }
  function avg(a) { return a.length ? a.reduce(function (s, x) { return s + x; }, 0) / a.length : null; }
  function modLabel(m) { return MODULES[m] || m; }
  function groupBy(arr, fn) { var o = {}; arr.forEach(function (x) { var k = fn(x); (o[k] = o[k] || []).push(x); }); return o; }
  function norm(s) { return String(s || '').trim().replace(/\s+/g, ' '); }

  /** Working days from a (exclusive) to b (inclusive); Mon–Fri minus holidays. Negative spans return null. */
  function workDays(a, b) {
    var da = parseD(a), db = typeof b === 'string' ? parseD(b) : b;
    if (!da || !db) return null;
    if (db < da) return null;
    var n = 0;
    for (var t = da.getTime() + DAY; t <= db.getTime(); t += DAY) {
      var d = new Date(t), w = d.getDay();
      if (w !== 0 && w !== 6 && !holidaySet[iso(d)]) n++;
    }
    return n;
  }

  function placeClass(p) {
    var s = norm(p).toLowerCase();
    if (!s) return 'Unspecified';
    if (/^on[\s-]?site/.test(s)) return 'On-site';
    if (/lab/.test(s)) return 'In-laboratory';
    return 'Unspecified';
  }
  function province(addr) {
    var a = norm(addr);
    if (!a) return 'Unspecified';
    for (var i = 0; i < PLACE_MATCHERS.length; i++) if (PLACE_MATCHERS[i][0].test(a)) return PLACE_MATCHERS[i][1];
    return 'Unspecified';
  }
  function period(m) { var v = +settings.periods[m]; return v > 0 ? v : DEFAULT_PERIOD; }

  function table(id, head, rows, emptyMsg) {
    var el = $(id);
    if (!rows.length) { el.innerHTML = '<tbody><tr><td class="empty">' + esc(emptyMsg || 'No records for this filter.') + '</td></tr></tbody>'; return; }
    el.innerHTML = '<thead><tr>' + head.map(function (h) { return '<th class="' + (h.num ? 'num' : '') + '">' + esc(h.t) + '</th>'; }).join('') + '</tr></thead><tbody>' +
      rows.map(function (r) { return '<tr>' + r.map(function (c, i) { return '<td class="' + (head[i].num ? 'num' : '') + '">' + (c && c.html != null ? c.html : esc(c)) + '</td>'; }).join('') + '</tr>'; }).join('') + '</tbody>';
  }
  function badge(text, kind) { return { html: '<span class="badge-s b-' + kind + '">' + esc(text) + '</span>' }; }

  // ------------------------------------------------------------------- charts
  var BASE_LAYOUT = {
    margin: { l: 50, r: 16, t: 10, b: 50 }, paper_bgcolor: 'rgba(0,0,0,0)', plot_bgcolor: 'rgba(0,0,0,0)',
    font: { family: 'inherit', size: 12, color: C.text2 }, hoverlabel: { bgcolor: '#fff', bordercolor: '#d0d5dd', font: { color: C.text } },
    xaxis: { gridcolor: C.grid, zeroline: false, linecolor: '#d0d5dd', automargin: true },
    yaxis: { gridcolor: C.grid, zeroline: false, linecolor: '#d0d5dd', automargin: true, rangemode: 'tozero' },
    bargap: 0.35, showlegend: false
  };
  var CONFIG = { displaylogo: false, responsive: true, modeBarButtonsToRemove: ['lasso2d', 'select2d', 'autoScale2d', 'toggleSpikelines'] };
  function plot(id, traces, layout) {
    var el = $(id);
    if (!window.Plotly) { el.innerHTML = '<div class="empty">Chart library not loaded.</div>'; return; }
    var has = traces.some(function (t) { return (t.x && t.x.length) || (t.y && t.y.length); });
    if (!has) { Plotly.purge(el); el.innerHTML = '<div class="empty">No data for this filter.</div>'; return; }
    el.innerHTML = '';
    var l = JSON.parse(JSON.stringify(BASE_LAYOUT));
    Object.keys(layout || {}).forEach(function (k) {
      l[k] = (typeof layout[k] === 'object' && !Array.isArray(layout[k]) && l[k]) ? Object.assign(l[k], layout[k]) : layout[k];
    });
    Plotly.react(el, traces, l, CONFIG);
  }
  function hbar(id, labels, values, hoverSuffix, color) {
    // Largest at top.
    plot(id, [{ type: 'bar', orientation: 'h', y: labels.slice().reverse(), x: values.slice().reverse(), marker: { color: color || C.s1 },
      hovertemplate: '%{y}: <b>%{x}</b>' + (hoverSuffix || '') + '<extra></extra>' }],
    { margin: { l: labelMargin(labels), r: 20, t: 10, b: 40 }, height: Math.max(220, labels.length * 26 + 60), yaxis: { automargin: false, gridcolor: 'rgba(0,0,0,0)' } });
  }
  function labelMargin(labels) {
    var n = labels.reduce(function (m, l) { return Math.max(m, String(l).length); }, 0);
    return Math.min(320, Math.max(60, Math.round(n * 6.6) + 14));
  }

  // ----------------------------------------------------------------- settings
  function loadSettings() {
    var s = null;
    try { s = JSON.parse(localStorage.getItem(SETTINGS_KEY) || 'null'); } catch (e) { s = null; }
    s = s || {};
    return { periods: s.periods || {}, near: s.near || 80, holidays: s.holidays || DEFAULT_HOLIDAYS.slice() };
  }
  function saveSettings() { try { localStorage.setItem(SETTINGS_KEY, JSON.stringify(settings)); } catch (e) { /* private mode */ } }
  function applyHolidays() { holidaySet = {}; settings.holidays.forEach(function (d) { holidaySet[d] = true; }); }
  function fillSettingsForm() {
    $('setPeriods').innerHTML = Object.keys(MODULES).map(function (m) {
      return '<div class="col-md-4 col-sm-6"><label class="small">' + esc(MODULES[m]) + '</label><input type="number" min="1" class="form-control form-control-sm" data-mod="' + m + '" value="' + period(m) + '"></div>';
    }).join('');
    $('setNear').value = settings.near;
    $('setHolidays').value = settings.holidays.join('\n');
    document.querySelectorAll('.nearPct').forEach(function (e) { e.textContent = settings.near; });
  }

  // ------------------------------------------------------------------ filters
  function filtered() {
    var from = $('fFrom').value, to = $('fTo').value, mod = $('fModule').value, place = $('fPlace').value;
    return RAW.worksheets.filter(function (w) {
      if (mod && w.module !== mod) return false;
      if (place && w._place !== place) return false;
      if ((from || to) && !w.dateReceived) return false;
      if (from && w.dateReceived < from) return false;
      if (to && w.dateReceived > to) return false;
      return true;
    });
  }
  function applyPreset(v) {
    var t = today(), f = '';
    if (v === 'all') { $('fFrom').value = ''; $('fTo').value = ''; return; }
    if (v === 'custom') return;
    if (/^y\d{4}$/.test(v)) { $('fFrom').value = v.slice(1) + '-01-01'; $('fTo').value = v.slice(1) + '-12-31'; return; }
    if (v === 'ytd') f = new Date(t.getFullYear(), 0, 1);
    else { var m = parseInt(v, 10); f = new Date(t.getFullYear(), t.getMonth() - m, t.getDate()); }
    $('fFrom').value = iso(f); $('fTo').value = iso(t);
  }

  // ------------------------------------------------------------------ enrich
  function enrich() {
    // Approval proxy: first non-draft certificate generated for the record.
    var approved = {}, scans = {};
    RAW.verifications.forEach(function (v) {
      var k = v.module + ':' + v.recordId;
      if (!v.isDraft) {
        var d = (v.createdAt || '').slice(0, 10);
        if (d && (!approved[k] || d < approved[k])) approved[k] = d;
        scans[k] = (scans[k] || 0) + v.scanCount;
      }
    });
    var t = today();
    RAW.worksheets.forEach(function (w) {
      var k = w.module + ':' + w.id;
      w._approved = approved[k] || '';
      w._place = placeClass(w.placeOfCalibration);
      w._province = province(w.address);
      w._customerKey = norm(w.customer).toLowerCase();
      w._request = norm(w.tsrNumber) || ('#' + w.module + ':' + w.id);
      w._completed = !!w.dateOfIssue;
      w._tat = w._completed ? workDays(w.dateReceived, w.dateOfIssue) : null;
      w._age = (!w._completed && w.dateReceived) ? workDays(w.dateReceived, t) : null;
      w._submitted = w.status !== 'Pending' || w.returned;
      w._returned = w.status === 'For Correction' || w.returned;
    });
  }

  // ------------------------------------------------------------------- render
  function render() {
    var rows = filtered();
    renderTiles(rows);
    renderTat(rows);
    renderStages(rows);
    renderOnTime(rows);
    renderVolume(rows);
    renderAging(rows);
    renderTypes(rows);
    renderPlace(rows);
    renderClients(rows);
    renderWork(rows);
    renderReturn(rows);
    renderDue();
    renderCerts(rows);
    renderStandards();
  }

  function tile(label, value, note, kind) {
    return '<div class="kpi-tile"><div class="t-label">' + esc(label) + '</div><div class="t-value"' + (kind ? ' style="color:var(--' + kind + ')"' : '') + '>' + esc(value) + '</div><div class="t-note">' + esc(note || '') + '</div></div>';
  }
  function renderTiles(rows) {
    var done = rows.filter(function (w) { return w._tat != null; });
    var onTime = done.filter(function (w) { return w._tat <= period(w.module); }).length;
    var open = rows.filter(function (w) { return !w._completed; });
    var past = open.filter(function (w) { return w._age != null && w._age > period(w.module); }).length;
    var sub = rows.filter(function (w) { return w._submitted; }), ret = sub.filter(function (w) { return w._returned; }).length;
    var requests = {}; rows.forEach(function (w) { requests[w._request] = 1; });
    var std = stdRows(false), expired = std.filter(function (s) { return s._days < 0; }).length, soon = std.filter(function (s) { return s._days >= 0 && s._days <= 60; }).length;
    var due30 = dueRows('30').length;
    var tatAvg = avg(done.map(function (w) { return w._tat; }));
    $('kpiTiles').innerHTML =
      tile('Average TAT', tatAvg == null ? '–' : fmt(tatAvg) + ' d', done.length + ' completed instruments') +
      tile('On-time completion', fmtPct(pct(onTime, done.length)), onTime + ' of ' + done.length + ' within period') +
      tile('Requests received', Object.keys(requests).length.toLocaleString(), rows.length.toLocaleString() + ' instruments') +
      tile('Open instruments', open.length.toLocaleString(), past + ' past the prescribed period', past ? 'critical' : null) +
      tile('Verification return rate', fmtPct(pct(ret, sub.length)), ret + ' of ' + sub.length + ' submitted') +
      tile('Certificates issued', done.length.toLocaleString(), 'with a Date of Issue') +
      tile('Due for recalibration', due30, 'client instruments, next 30 days') +
      tile('Standards needing action', expired + soon, expired + ' expired, ' + soon + ' due ≤ 60 days', expired ? 'critical' : (soon ? 'warning' : null));
  }

  function stats(list) {
    var v = list.map(function (w) { return w._tat; });
    return { n: v.length, avg: avg(v), min: v.length ? Math.min.apply(null, v) : null, max: v.length ? Math.max.apply(null, v) : null };
  }
  function renderTat(rows) {
    var done = rows.filter(function (w) { return w._tat != null; });
    var groups, keys, label;
    if (ui.tat === 'month') {
      groups = groupBy(done, function (w) { return monthKey(w.dateOfIssue); });
      keys = Object.keys(groups).sort(); label = monthLabel;
    } else {
      groups = groupBy(done, function (w) { return w.module; });
      keys = Object.keys(groups).sort(function (a, b) { return stats(groups[b]).avg - stats(groups[a]).avg; }); label = modLabel;
    }
    var st = keys.map(function (k) { return stats(groups[k]); });
    var x = keys.map(label);
    var px = ui.tat === 'month' ? keys.map(function (k) { return k + '-01'; }) : x;
    plot('chTat', [
      { type: 'bar', x: px, y: st.map(function (s) { return s.avg; }), marker: { color: C.s1 }, name: 'Average', text: x,
        error_y: { type: 'data', symmetric: false, array: st.map(function (s) { return s.max - s.avg; }), arrayminus: st.map(function (s) { return s.avg - s.min; }), color: C.text2, thickness: 1, width: 3 },
        customdata: st.map(function (s) { return [s.min, s.max, s.n]; }),
        textposition: 'none', hovertemplate: '<b>%{text}</b><br>Average %{y:.1f} d<br>Min %{customdata[0]} d · Max %{customdata[1]} d<br>%{customdata[2]} instruments<extra></extra>' }
    ], { yaxis: { title: { text: 'Working days' } }, xaxis: ui.tat === 'month' ? { type: 'date', tickformat: '%b %Y' } : { type: 'category', tickangle: -30 } });
    table('tblTat', [{ t: ui.tat === 'month' ? 'Month issued' : 'Equipment type' }, { t: 'Instruments', num: 1 }, { t: 'Average', num: 1 }, { t: 'Min', num: 1 }, { t: 'Max', num: 1 }],
      keys.map(function (k, i) { return [x[i], st[i].n, fmt(st[i].avg), st[i].min, st[i].max]; }),
      'No instrument has both a Date Received and a Date of Issue.');
  }

  function renderStages(rows) {
    var done = rows.filter(function (w) { return w._completed && w.dateReceived && w.dateCalibrated; });
    var g = groupBy(done, function (w) { return w.module; });
    var keys = Object.keys(g);
    var s = keys.map(function (k) {
      var q = [], v = [], r = [], vr = [];
      g[k].forEach(function (w) {
        var a = workDays(w.dateReceived, w.dateCalibrated); if (a != null) q.push(a);
        if (w._approved && w._approved >= w.dateCalibrated && w._approved <= w.dateOfIssue) {
          v.push(workDays(w.dateCalibrated, w._approved)); r.push(workDays(w._approved, w.dateOfIssue));
        } else {
          var b = workDays(w.dateCalibrated, w.dateOfIssue); if (b != null) vr.push(b);
        }
      });
      return { k: k, q: avg(q), v: avg(v), r: avg(r), vr: avg(vr), n: g[k].length, nApproved: v.length };
    });
    s.sort(function (a, b) { return ((a.q || 0) + (a.v || 0) + (a.r || 0) + (a.vr || 0)) - ((b.q || 0) + (b.v || 0) + (b.r || 0) + (b.vr || 0)); });
    var y = s.map(function (x) { return modLabel(x.k); });
    function tr(name, field, color) {
      return { type: 'bar', orientation: 'h', name: name, y: y, x: s.map(function (x) { return x[field] == null ? 0 : x[field]; }), marker: { color: color, line: { color: '#fff', width: 2 } },
        customdata: s.map(function (x) { return [x.n, x.nApproved]; }),
        hovertemplate: '<b>%{y}</b><br>' + name + ': %{x:.1f} d<br>%{customdata[0]} completed · %{customdata[1]} with approval date<extra></extra>' };
    }
    plot('chStage', [tr('Queue & calibration', 'q', C.s1), tr('Verification', 'v', C.s2), tr('Release', 'r', C.s3), tr('Verification + release', 'vr', C.neutral)],
      { barmode: 'stack', showlegend: true, legend: { orientation: 'h', x: 0, y: 1.02, yanchor: 'bottom', traceorder: 'normal' }, margin: { l: labelMargin(y), r: 20, t: 40, b: 50 },
        height: Math.max(300, y.length * 28 + 130), xaxis: { title: { text: 'Average working days' } }, yaxis: { automargin: false, gridcolor: 'rgba(0,0,0,0)' } });
  }

  function renderOnTime(rows) {
    var done = rows.filter(function (w) { return w._tat != null; });
    var g = groupBy(done, function (w) { return w.module; });
    var out = Object.keys(g).map(function (k) {
      var ok = g[k].filter(function (w) { return w._tat <= period(k); }).length;
      return [k, period(k), g[k].length, ok, pct(ok, g[k].length)];
    }).sort(function (a, b) { return a[4] - b[4]; });
    var tot = done.length, totOk = done.filter(function (w) { return w._tat <= period(w.module); }).length;
    var rowsOut = out.map(function (r) {
      return [modLabel(r[0]), r[1], r[2], r[3], badge(fmtPct(r[4]), r[4] >= 90 ? 'good' : r[4] >= 70 ? 'warn' : 'crit')];
    });
    if (out.length) rowsOut.push([{ html: '<b>All types</b>' }, '', tot, totOk, badge(fmtPct(pct(totOk, tot)), 'neutral')]);
    table('tblOnTime', [{ t: 'Equipment type' }, { t: 'Period (d)', num: 1 }, { t: 'Completed', num: 1 }, { t: 'On time', num: 1 }, { t: 'Rate', num: 1 }], rowsOut);
  }

  function weekKey(s) {
    var d = parseD(s), day = (d.getDay() + 6) % 7; d.setDate(d.getDate() - day); return iso(d); // Monday
  }
  function renderVolume(rows) {
    var fn = ui.vol === 'day' ? function (s) { return s; } : ui.vol === 'week' ? weekKey : function (s) { return monthKey(s) + '-01'; };
    var req = {};
    rows.forEach(function (w) { if (!w.dateReceived) return; var k = fn(w.dateReceived); (req[k] = req[k] || {})[w._request] = 1; });
    var keys = Object.keys(req).sort();
    var y = keys.map(function (k) { return Object.keys(req[k]).length; });
    var lbl = ui.vol === 'month' ? 'Month of %{x|%b %Y}' : ui.vol === 'week' ? 'Week of %{x|%d %b %Y}' : '%{x|%d %b %Y}';
    plot('chVolume', [{ type: ui.vol === 'day' ? 'bar' : 'scatter', mode: 'lines+markers', x: keys, y: y, line: { color: C.s1, width: 2 }, marker: { color: C.s1, size: 7 },
      hovertemplate: lbl + '<br><b>%{y}</b> requests<extra></extra>' }],
    { hovermode: 'x unified', yaxis: { title: { text: 'Requests' } }, xaxis: { type: 'date' } });
  }

  function agingState(w) {
    var p = period(w.module);
    if (w._age == null) return ['No date received', 'neutral'];
    if (w._age > p) return ['Past due', 'crit'];
    if (w._age >= p * settings.near / 100) return ['Nearing', 'warn'];
    return ['On track', 'good'];
  }
  function renderAging(rows) {
    var open = rows.filter(function (w) { return !w._completed; });
    var byStatus = groupBy(open, function (w) { return w.status; });
    var order = ['Pending', 'For Verification', 'For Correction', 'For printing'];
    var sk = Object.keys(byStatus).sort(function (a, b) { return (order.indexOf(a) + 1 || 99) - (order.indexOf(b) + 1 || 99); });
    hbar('chAgingStatus', sk, sk.map(function (k) { return byStatus[k].length; }), ' open');
    var buckets = [['0–5 d', 0, 5], ['6–10 d', 6, 10], ['11–20 d', 11, 20], ['21–60 d', 21, 60], ['61+ d', 61, Infinity]];
    var bc = buckets.map(function (b) { return open.filter(function (w) { return w._age != null && w._age >= b[1] && w._age <= b[2]; }).length; });
    plot('chAgingBuckets', [{ type: 'bar', x: buckets.map(function (b) { return b[0]; }), y: bc, marker: { color: C.s1 }, hovertemplate: '%{x} open: <b>%{y}</b><extra></extra>' }],
      { height: 220, yaxis: { title: { text: 'Instruments' } }, margin: { l: 50, r: 16, t: 10, b: 40 } });
    var list = open.map(function (w) { return { w: w, st: agingState(w) }; })
      .filter(function (x) { return ui.aging === 'all' || x.st[1] === 'crit' || x.st[1] === 'warn'; })
      .sort(function (a, b) { return (b.w._age || -1) - (a.w._age || -1); });
    table('tblAging', [{ t: 'Alert' }, { t: 'Days', num: 1 }, { t: 'Status' }, { t: 'Certificate / TSR' }, { t: 'Customer' }, { t: 'Type' }, { t: 'Received' }],
      list.slice(0, 500).map(function (x) {
        var w = x.w; return [badge(x.st[0], x.st[1]), w._age == null ? '–' : w._age, w.status, (w.certificateNumber || '–') + (w.tsrNumber ? ' · ' + w.tsrNumber : ''), w.customer, modLabel(w.module), w.dateReceived || '–'];
      }), ui.aging === 'all' ? 'No open instruments.' : 'No open instruments nearing or past their period.');
  }

  function renderTypes(rows) {
    var g = groupBy(rows, function (w) { return w.module; });
    var keys = Object.keys(g).sort(function (a, b) { return g[b].length - g[a].length; });
    hbar('chTypes', keys.map(function (k) { return modLabel(k) + '  ' + fmtPct(pct(g[k].length, rows.length)); }), keys.map(function (k) { return g[k].length; }), ' instruments');
    var d = groupBy(rows, function (w) { return norm(w.equipmentDescription) || '(blank)'; });
    var dk = Object.keys(d).sort(function (a, b) { return d[b].length - d[a].length; }).slice(0, 40);
    table('tblDesc', [{ t: 'Equipment description' }, { t: 'Count', num: 1 }, { t: '%', num: 1 }], dk.map(function (k) { return [k, d[k].length, fmtPct(pct(d[k].length, rows.length))]; }));
  }

  function renderPlace(rows) {
    var g = groupBy(rows, function (w) { return w._place; });
    var lab = (g['In-laboratory'] || []).length, site = (g['On-site'] || []).length, un = (g['Unspecified'] || []).length, tot = rows.length || 1;
    function seg(n, color, label) { return n ? '<div style="flex:' + n + ';background:' + color + '" title="' + esc(label + ': ' + n) + '">' + (n / tot > 0.12 ? esc(fmtPct(100 * n / tot)) : '') + '</div>' : ''; }
    $('placeSplit').innerHTML =
      '<div class="kpi-tiles" style="grid-template-columns:repeat(3,1fr);margin-bottom:6px">' +
      tile('In-laboratory', fmtPct(pct(lab, rows.length)), lab + ' instruments') + tile('On-site', fmtPct(pct(site, rows.length)), site + ' instruments') + tile('Unspecified', fmtPct(pct(un, rows.length)), un + ' instruments') + '</div>' +
      '<div class="split-bar">' + seg(lab, C.s1, 'In-laboratory') + seg(site, C.s2, 'On-site') + seg(un, C.neutral, 'Unspecified') + '</div>' +
      '<div class="legend"><span><i style="background:' + C.s1 + '"></i>In-laboratory</span><span><i style="background:' + C.s2 + '"></i>On-site</span><span><i style="background:' + C.neutral + '"></i>Unspecified</span></div>';
    var byMod = groupBy(rows, function (w) { return w.module; });
    table('tblPlace', [{ t: 'Equipment type' }, { t: 'In-lab', num: 1 }, { t: 'On-site', num: 1 }, { t: 'Unspecified', num: 1 }],
      Object.keys(byMod).sort().map(function (k) {
        var c = { 'In-laboratory': 0, 'On-site': 0, 'Unspecified': 0 }; byMod[k].forEach(function (w) { c[w._place]++; });
        return [modLabel(k), c['In-laboratory'], c['On-site'], c['Unspecified']];
      }));
  }

  function renderClients(rows) {
    var g = groupBy(rows.filter(function (w) { return w._customerKey; }), function (w) { return w._customerKey; });
    var clients = Object.keys(g).map(function (k) {
      var req = {}; g[k].forEach(function (w) { req[w._request] = 1; });
      return { name: norm(g[k][0].customer), province: g[k][0]._province, instruments: g[k].length, requests: Object.keys(req).length };
    }).sort(function (a, b) { return b.requests - a.requests || b.instruments - a.instruments; });
    var totalReq = {}; rows.forEach(function (w) { totalReq[w._request] = 1; }); var nReq = Object.keys(totalReq).length;
    var repeat = clients.filter(function (c) { return c.requests > 1; }).length;
    var top = clients.slice(0, 15);
    hbar('chClients', top.map(function (c) { return c.name.length > 42 ? c.name.slice(0, 40) + '…' : c.name; }), top.map(function (c) { return c.requests; }), ' requests');
    var p = {}; rows.forEach(function (w) { var k = w._province; p[k] = p[k] || { req: {}, cust: {} }; p[k].req[w._request] = 1; if (w._customerKey) p[k].cust[w._customerKey] = 1; });
    var pk = Object.keys(p).sort(function (a, b) { return Object.keys(p[b].req).length - Object.keys(p[a].req).length; });
    table('tblProvince', [{ t: 'Province' }, { t: 'Requests', num: 1 }, { t: '%', num: 1 }, { t: 'Clients', num: 1 }],
      pk.map(function (k) { var n = Object.keys(p[k].req).length; return [k, n, fmtPct(pct(n, nReq)), Object.keys(p[k].cust).length]; }));
    table('tblClients', [{ t: 'Client (' + clients.length + ' total, ' + repeat + ' repeat — ' + fmtPct(pct(repeat, clients.length)) + ')' }, { t: 'Requests', num: 1 }, { t: '%', num: 1 }, { t: 'Instruments', num: 1 }],
      clients.map(function (c) { return [{ html: esc(c.name) + (c.requests > 1 ? ' <span class="badge-s b-neutral">repeat</span>' : '') }, c.requests, fmtPct(pct(c.requests, nReq)), c.instruments]; }));
  }

  function renderWork(rows) {
    var officer = ui.work === 'officer';
    var g = groupBy(rows, function (w) { return norm(officer ? w.calibrationOfficer : w.checkedBy) || '(not set)'; });
    var out = Object.keys(g).map(function (k) {
      var l = g[k], c = function (f) { return l.filter(f).length; };
      return officer
        ? [k, l.length, c(function (w) { return w._completed; }), c(function (w) { return !w._completed && w.status === 'Pending'; }), c(function (w) { return !w._completed && w.status === 'For Correction'; }), c(function (w) { return !w._completed && (w.status === 'For Verification' || w.status === 'For printing'); })]
        : [k, l.length, c(function (w) { return w.status === 'For printing' || w._completed; }), c(function (w) { return w.status === 'For Verification'; }), c(function (w) { return w._returned; }), c(function (w) { return w.status === 'Pending' && !w._completed; })];
    }).sort(function (a, b) { return b[1] - a[1]; });
    table('tblWork', officer
      ? [{ t: 'Calibration officer' }, { t: 'Assigned', num: 1 }, { t: 'Completed', num: 1 }, { t: 'Pending', num: 1 }, { t: 'For correction', num: 1 }, { t: 'With verifier / printing', num: 1 }]
      : [{ t: 'Verifier (Checked By)' }, { t: 'Assigned', num: 1 }, { t: 'Verified / issued', num: 1 }, { t: 'Awaiting verification', num: 1 }, { t: 'Returned', num: 1 }, { t: 'Not yet submitted', num: 1 }], out);
  }

  function renderReturn(rows) {
    var sub = rows.filter(function (w) { return w._submitted; });
    var g = groupBy(sub, function (w) { return w.module; });
    var out = Object.keys(g).map(function (k) { var r = g[k].filter(function (w) { return w._returned; }).length; return [modLabel(k), g[k].length, r, pct(r, g[k].length)]; })
      .sort(function (a, b) { return b[3] - a[3]; });
    var tr = sub.filter(function (w) { return w._returned; }).length;
    var o = out.map(function (r) { return [r[0], r[1], r[2], badge(fmtPct(r[3]), r[3] <= 10 ? 'good' : r[3] <= 25 ? 'warn' : 'crit')]; });
    if (out.length) o.push([{ html: '<b>All types</b>' }, sub.length, tr, badge(fmtPct(pct(tr, sub.length)), 'neutral')]);
    table('tblReturn', [{ t: 'Equipment type' }, { t: 'Submitted', num: 1 }, { t: 'Returned', num: 1 }, { t: 'Return rate', num: 1 }], o, 'No worksheet has been submitted for verification in this filter.');
  }

  function dueRows(win) {
    var t = today(), mod = $('fModule').value, place = $('fPlace').value;
    return RAW.worksheets.filter(function (w) {
      if (!w.recommendedDueDate) return false;
      if (mod && w.module !== mod) return false;
      if (place && w._place !== place) return false;
      var d = (parseD(w.recommendedDueDate) - t) / DAY;
      w._dueIn = Math.round(d);
      return win === 'overdue' ? (d < 0 && d >= -90) : (d >= 0 && d <= +win);
    }).sort(function (a, b) { return a.recommendedDueDate < b.recommendedDueDate ? -1 : 1; });
  }
  function renderDue() {
    var list = dueRows(ui.due);
    table('tblDue', [{ t: 'Due date' }, { t: 'In (days)', num: 1 }, { t: 'Customer' }, { t: 'Equipment' }, { t: 'Equipment ID' }, { t: 'Serial no.' }, { t: 'Last certificate' }],
      list.map(function (w) {
        return [w.recommendedDueDate, w._dueIn < 0 ? badge(w._dueIn, 'crit') : w._dueIn <= 7 ? badge(w._dueIn, 'warn') : w._dueIn, w.customer, (w.equipmentDescription || modLabel(w.module)), w.equipmentId || '–', w.serialNumber || '–', w.certificateNumber || '–'];
      }), 'No client instrument due in this window.');
  }

  function renderCerts(rows) {
    var g = groupBy(rows.filter(function (w) { return w._completed; }), function (w) { return monthKey(w.dateOfIssue); });
    var keys = Object.keys(g).sort();
    plot('chCerts', [{ type: 'bar', x: keys.map(function (k) { return k + '-01'; }), y: keys.map(function (k) { return g[k].length; }), marker: { color: C.s1 },
      hovertemplate: '%{x|%b %Y}: <b>%{y}</b> certificates<extra></extra>' }], { xaxis: { type: 'date', tickformat: '%b %Y' }, yaxis: { title: { text: 'Certificates issued' } } });
    var ids = {}; rows.forEach(function (w) { ids[w.module + ':' + w.id] = w; });
    var qr = RAW.verifications.filter(function (v) { return !v.isDraft && ids[v.module + ':' + v.recordId]; })
      .sort(function (a, b) { return b.scanCount - a.scanCount; });
    var totalScans = qr.reduce(function (s, v) { return s + v.scanCount; }, 0);
    table('tblQr', [{ t: 'Certificate (' + qr.length + ' with QR, ' + totalScans + ' scans)' }, { t: 'Type' }, { t: 'Customer' }, { t: 'Scans', num: 1 }, { t: 'Last scan' }],
      qr.map(function (v) { var w = ids[v.module + ':' + v.recordId]; return [v.certificateNumber || w.certificateNumber, modLabel(v.module), w.customer, v.scanCount, v.lastScannedAt ? v.lastScannedAt.slice(0, 16) : '–']; }),
      'No final certificate with a QR code yet. QR logging starts with certificates generated after the QR feature was installed.');
  }

  function stdRows(includeInactive) {
    var t = today();
    return RAW.standards.filter(function (s) { return includeInactive || s.active; }).map(function (s) {
      s._days = s.dueDate ? Math.round((parseD(s.dueDate) - t) / DAY) : null; return s;
    });
  }
  function renderStandards() {
    var list = stdRows($('stdInactive').checked).filter(function (s) { return ui.std === 'all' || s._days == null || s._days <= 60; })
      .sort(function (a, b) { return (a._days == null ? 1e9 : a._days) - (b._days == null ? 1e9 : b._days); });
    table('tblStd', [{ t: 'State' }, { t: 'Days left', num: 1 }, { t: 'Due date' }, { t: 'Standard' }, { t: 'Type' }, { t: 'Serial / ID' }, { t: 'Certificate no.' }, { t: 'Calibrated' }],
      list.map(function (s) {
        var st = s._days == null ? badge('No date', 'neutral') : s._days < 0 ? badge('Expired', 'crit') : s._days <= 30 ? badge('Due ≤ 30 d', 'warn') : s._days <= 60 ? badge('Due ≤ 60 d', 'warn') : badge('Valid', 'good');
        return [st, s._days == null ? '–' : s._days, s.dueDate || '–', s.description + (s.active ? '' : ' (inactive)'), s.type, s.serialNumber || '–', s.certificateNumber || '–', s.dateCalibrated || '–'];
      }), 'No standard is expired or due within 60 days.');
  }

  // ------------------------------------------------------------------- export
  function exportCsv() {
    var rows = filtered();
    var head = ['Equipment type', 'Certificate', 'TSR', 'Customer', 'Province', 'Place', 'Status', 'Date received', 'Date calibrated', 'Approval (proxy)', 'Date of issue',
      'TAT (working d)', 'Prescribed (d)', 'On time', 'Days open', 'Calibration officer', 'Checked by', 'Returned', 'Recommended due'];
    var lines = [head].concat(rows.map(function (w) {
      return [modLabel(w.module), w.certificateNumber, w.tsrNumber, w.customer, w._province, w._place, w.status, w.dateReceived, w.dateCalibrated, w._approved, w.dateOfIssue,
        w._tat, period(w.module), w._tat == null ? '' : (w._tat <= period(w.module) ? 'yes' : 'no'), w._age, w.calibrationOfficer, w.checkedBy, w._returned ? 'yes' : 'no', w.recommendedDueDate];
    })).map(function (r) { return r.map(function (c) { c = c == null ? '' : String(c); return /[",\n]/.test(c) ? '"' + c.replace(/"/g, '""') + '"' : c; }).join(','); });
    var blob = new Blob(['﻿' + lines.join('\r\n')], { type: 'text/csv' });
    var a = document.createElement('a'); a.href = URL.createObjectURL(blob); a.download = 'rml-kpi-' + iso(today()) + '.csv';
    document.body.appendChild(a); a.click(); setTimeout(function () { URL.revokeObjectURL(a.href); a.remove(); }, 500);
  }

  // --------------------------------------------------------------------- wire
  function seg(id, key) {
    $(id).addEventListener('click', function (e) {
      var b = e.target.closest('button'); if (!b) return;
      ui[key] = b.getAttribute('data-v');
      $(id).querySelectorAll('button').forEach(function (x) { x.classList.toggle('on', x === b); });
      render();
    });
  }

  function load() {
    $('kpiLoading').style.display = ''; $('kpiLoading').textContent = 'Loading KPI data…';
    fetch(window.KPI_DATA_URL, { credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' } })
      .then(function (r) { if (!r.ok) throw new Error('HTTP ' + r.status); return r.json(); })
      .then(function (data) {
        RAW = data; MODULES = data.modules || {};
        var sel = $('fModule'), cur = sel.value;
        sel.innerHTML = '<option value="">All types</option>' + Object.keys(MODULES).map(function (k) { return '<option value="' + k + '">' + esc(MODULES[k]) + '</option>'; }).join('');
        sel.value = cur;
        var years = {}; data.worksheets.forEach(function (w) { if (w.dateReceived) years[w.dateReceived.slice(0, 4)] = 1; });
        var pre = $('fPreset'), pcur = pre.value;
        pre.querySelectorAll('option[data-year]').forEach(function (o) { o.remove(); });
        Object.keys(years).sort().reverse().forEach(function (y) { var o = document.createElement('option'); o.value = 'y' + y; o.textContent = 'Year ' + y; o.setAttribute('data-year', 1); pre.insertBefore(o, pre.querySelector('option[value=custom]')); });
        pre.value = pcur;
        applyHolidays(); enrich(); fillSettingsForm();
        $('kpiGenerated').textContent = 'Loaded ' + new Date().toLocaleString() + ' · ' + data.worksheets.length + ' worksheets, ' + data.standards.length + ' reference standards';
        $('kpiLoading').style.display = 'none'; $('kpiBody').style.display = '';
        render();
      })
      .catch(function (e) { $('kpiLoading').textContent = 'Could not load KPI data (' + e.message + '). Your session may have expired; log in again.'; });
  }

  document.addEventListener('DOMContentLoaded', function () {
    seg('tatGroup', 'tat'); seg('volGroup', 'vol'); seg('agingFilter', 'aging'); seg('workGroup', 'work'); seg('dueWindow', 'due'); seg('stdWindow', 'std');
    ['fFrom', 'fTo'].forEach(function (id) { $(id).addEventListener('change', function () { $('fPreset').value = 'custom'; if (RAW) render(); }); });
    $('fPreset').addEventListener('change', function () { applyPreset(this.value); if (RAW) render(); });
    ['fModule', 'fPlace'].forEach(function (id) { $(id).addEventListener('change', function () { if (RAW) render(); }); });
    $('stdInactive').addEventListener('change', function () { if (RAW) render(); });
    $('kpiReload').addEventListener('click', load);
    $('kpiExport').addEventListener('click', function () { if (RAW) exportCsv(); });
    $('setSave').addEventListener('click', function () {
      document.querySelectorAll('#setPeriods input').forEach(function (i) { settings.periods[i.getAttribute('data-mod')] = Math.max(1, parseInt(i.value, 10) || DEFAULT_PERIOD); });
      settings.near = Math.min(100, Math.max(1, parseInt($('setNear').value, 10) || 80));
      settings.holidays = $('setHolidays').value.split(/\s+/).filter(function (d) { return /^\d{4}-\d{2}-\d{2}$/.test(d); });
      saveSettings(); applyHolidays(); enrich(); fillSettingsForm(); render();
    });
    $('setReset').addEventListener('click', function () {
      try { localStorage.removeItem(SETTINGS_KEY); } catch (e) { /* ignore */ }
      settings = loadSettings(); applyHolidays(); enrich(); fillSettingsForm(); render();
    });
    load();
  });
})();
