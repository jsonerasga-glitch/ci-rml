<!DOCTYPE html>
<html lang="en">
<?= view('layouts/head-essential'); ?>
<style>
  .kpi-root {
    --surface: #ffffff;
    --surface-2: #f7f9fd;
    --border: #e3e7ef;
    --text-primary: #0b0b0b;
    --text-secondary: #52514e;
    --text-muted: #8a8984;
    --series-1: #2a78d6;
    --series-2: #eb6834;
    --series-3: #1baf7a;
    --series-4: #eda100;
    --good: #0f7b3a;      --good-bg: #e3f4ea;
    --warning: #8a5a00;   --warning-bg: #fff3d6;
    --critical: #b42318;  --critical-bg: #fde7e5;
    color: var(--text-primary);
  }
  .kpi-root h2.kpi-h { font-size: 1.05rem; font-weight: 700; margin: 0 0 2px; }
  .kpi-root .kpi-sub { font-size: .8rem; color: var(--text-secondary); margin: 0 0 12px; }
  .kpi-root .kpi-card { background: var(--surface); border: 1px solid var(--border); border-radius: 10px; padding: 16px 18px; margin-bottom: 18px; }
  .kpi-root .kpi-filters { display: flex; flex-wrap: wrap; gap: 10px; align-items: end; background: var(--surface); border: 1px solid var(--border); border-radius: 10px; padding: 12px 16px; margin-bottom: 18px; position: sticky; top: 0; z-index: 5; }
  .kpi-root .kpi-filters label { font-size: .72rem; color: var(--text-secondary); display: block; margin-bottom: 2px; text-transform: uppercase; letter-spacing: .03em; }
  .kpi-root .kpi-filters .form-control, .kpi-root .kpi-filters .form-select { font-size: .85rem; padding: 4px 8px; height: 32px; }
  .kpi-root .kpi-tiles { display: grid; grid-template-columns: repeat(auto-fill, minmax(170px, 1fr)); gap: 12px; margin-bottom: 18px; }
  .kpi-root .kpi-tile { background: var(--surface); border: 1px solid var(--border); border-radius: 10px; padding: 12px 14px; }
  .kpi-root .kpi-tile .t-label { font-size: .72rem; color: var(--text-secondary); text-transform: uppercase; letter-spacing: .03em; }
  .kpi-root .kpi-tile .t-value { font-size: 1.6rem; font-weight: 700; line-height: 1.2; font-variant-numeric: tabular-nums; }
  .kpi-root .kpi-tile .t-note { font-size: .74rem; color: var(--text-muted); }
  .kpi-root .kpi-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
  @media (max-width: 1100px) { .kpi-root .kpi-grid-2 { grid-template-columns: 1fr; } }
  .kpi-root .kpi-chart { width: 100%; min-height: 280px; }
  .kpi-root table.kpi-table { width: 100%; font-size: .8rem; border-collapse: collapse; }
  .kpi-root table.kpi-table th { position: sticky; top: 0; background: var(--surface-2); color: var(--text-secondary); font-weight: 600; text-align: left; padding: 6px 8px; border-bottom: 1px solid var(--border); white-space: nowrap; }
  .kpi-root table.kpi-table td { padding: 5px 8px; border-bottom: 1px solid var(--border); vertical-align: top; }
  .kpi-root table.kpi-table td.num, .kpi-root table.kpi-table th.num { text-align: right; font-variant-numeric: tabular-nums; }
  .kpi-root .kpi-scroll { max-height: 340px; overflow: auto; border: 1px solid var(--border); border-radius: 6px; }
  .kpi-root .badge-s { display: inline-block; padding: 1px 7px; border-radius: 999px; font-size: .72rem; font-weight: 600; white-space: nowrap; }
  .kpi-root .b-good { color: var(--good); background: var(--good-bg); }
  .kpi-root .b-warn { color: var(--warning); background: var(--warning-bg); }
  .kpi-root .b-crit { color: var(--critical); background: var(--critical-bg); }
  .kpi-root .b-neutral { color: var(--text-secondary); background: var(--surface-2); border: 1px solid var(--border); }
  .kpi-root .kpi-note { font-size: .75rem; color: var(--text-muted); margin-top: 8px; }
  .kpi-root .seg { display: inline-flex; border: 1px solid var(--border); border-radius: 6px; overflow: hidden; }
  .kpi-root .seg button { border: 0; background: var(--surface); padding: 3px 10px; font-size: .78rem; color: var(--text-secondary); }
  .kpi-root .seg button.on { background: var(--series-1); color: #fff; }
  .kpi-root .head-row { display: flex; justify-content: space-between; align-items: start; gap: 10px; flex-wrap: wrap; }
  .kpi-root .split-bar { display: flex; height: 26px; border-radius: 6px; overflow: hidden; gap: 2px; margin: 8px 0; }
  .kpi-root .split-bar div { color: #fff; font-size: .75rem; display: flex; align-items: center; padding: 0 8px; white-space: nowrap; }
  .kpi-root .legend { display: flex; gap: 14px; flex-wrap: wrap; font-size: .78rem; color: var(--text-secondary); }
  .kpi-root .legend i { display: inline-block; width: 10px; height: 10px; border-radius: 2px; margin-right: 5px; vertical-align: -1px; }
  .kpi-root .empty { color: var(--text-muted); font-size: .85rem; padding: 18px 0; text-align: center; }
  #kpiLoading { padding: 40px; text-align: center; color: #52514e; }
</style>
<body class="skin-dark animate">
<?= view('layouts/sidebarAdmin', ['active' => 'kpi', 'show' => 'kpi']) ?>

<div class="content">
  <div class="content-header">
    <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
    <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
  </div>
  <div class="content-body kpi-root">
    <div class="head-row">
      <div>
        <label class="content-label"><b>Key Performance Indicators</b></label>
        <p class="kpi-sub" id="kpiGenerated">Loading…</p>
      </div>
      <div>
        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#kpiSettings">Settings</button>
        <button class="btn btn-sm btn-outline-primary" id="kpiExport">Export CSV</button>
        <button class="btn btn-sm btn-primary" id="kpiReload">Refresh</button>
      </div>
    </div>

    <div class="kpi-filters">
      <div><label for="fFrom">Received from</label><input type="date" id="fFrom" class="form-control"></div>
      <div><label for="fTo">Received to</label><input type="date" id="fTo" class="form-control"></div>
      <div><label for="fPreset">Range</label>
        <select id="fPreset" class="form-select">
          <option value="all">All time</option>
          <option value="ytd">This year</option>
          <option value="12m">Last 12 months</option>
          <option value="6m">Last 6 months</option>
          <option value="3m">Last 3 months</option>
          <option value="custom">Custom</option>
        </select></div>
      <div><label for="fModule">Equipment type</label><select id="fModule" class="form-select"><option value="">All types</option></select></div>
      <div><label for="fPlace">Place</label>
        <select id="fPlace" class="form-select"><option value="">All</option><option>In-laboratory</option><option>On-site</option><option>Unspecified</option></select></div>
    </div>

    <div id="kpiLoading">Loading KPI data…</div>
    <div id="kpiBody" style="display:none">

      <div class="kpi-tiles" id="kpiTiles"></div>

      <!-- 1 + 3 -->
      <div class="kpi-card">
        <div class="head-row">
          <div><h2 class="kpi-h">Calibration Turnaround Time (TAT)</h2>
            <p class="kpi-sub">Working days from Date Received to Date of Certificate Issue, for instruments with both dates.</p></div>
          <div class="seg" id="tatGroup"><button data-v="month" class="on">Per month</button><button data-v="module">Per equipment type</button></div>
        </div>
        <div class="kpi-grid-2">
          <div id="chTat" class="kpi-chart"></div>
          <div class="kpi-scroll"><table class="kpi-table" id="tblTat"></table></div>
        </div>
      </div>

      <div class="kpi-grid-2">
        <div class="kpi-card">
          <h2 class="kpi-h">Stage Processing Time</h2>
          <p class="kpi-sub">Average working days per stage, by equipment type.</p>
          <div id="chStage" class="kpi-chart" style="min-height:380px"></div>
          <p class="kpi-note">Queue &amp; calibration = received → calibrated. Verification = calibrated → first final (non-draft) certificate generated, used as the approval date because the system does not store one. Release = approval → Date of Issue. Records printed before QR logging began have no approval date; their calibrated → issue time is shown as “Verification + release”.</p>
        </div>
        <div class="kpi-card">
          <h2 class="kpi-h">On-Time Completion Rate</h2>
          <p class="kpi-sub">Completed instruments released within the prescribed processing period (set in Settings).</p>
          <div class="kpi-scroll"><table class="kpi-table" id="tblOnTime"></table></div>
        </div>
      </div>

      <!-- 4 -->
      <div class="kpi-card">
        <div class="head-row">
          <div><h2 class="kpi-h">Request Volume</h2>
            <p class="kpi-sub">Distinct TSR numbers by Date Received (instruments without a TSR count individually).</p></div>
          <div class="seg" id="volGroup"><button data-v="day">Day</button><button data-v="week">Week</button><button data-v="month" class="on">Month</button></div>
        </div>
        <div id="chVolume" class="kpi-chart"></div>
      </div>

      <!-- 5 -->
      <div class="kpi-card">
        <div class="head-row">
          <div><h2 class="kpi-h">Pending Requests and Aging</h2>
            <p class="kpi-sub">Instruments with no Date of Issue. Days open = working days since Date Received.</p></div>
          <div class="seg" id="agingFilter"><button data-v="all" class="on">All open</button><button data-v="alert">Alerts only</button></div>
        </div>
        <div class="kpi-grid-2">
          <div>
            <div id="chAgingStatus" class="kpi-chart" style="min-height:220px"></div>
            <div id="chAgingBuckets" class="kpi-chart" style="min-height:220px"></div>
          </div>
          <div class="kpi-scroll" style="max-height:460px"><table class="kpi-table" id="tblAging"></table></div>
        </div>
        <p class="kpi-note">“Nearing” = at least <span class="nearPct"></span>% of the prescribed period used; “Past due” = over the prescribed period.</p>
      </div>

      <!-- 6 + 8 -->
      <div class="kpi-grid-2">
        <div class="kpi-card">
          <h2 class="kpi-h">Instrument Type Distribution</h2>
          <p class="kpi-sub">Instruments per equipment type (worksheet module).</p>
          <div id="chTypes" class="kpi-chart" style="min-height:380px"></div>
          <details><summary class="kpi-note">Top equipment descriptions</summary>
            <div class="kpi-scroll"><table class="kpi-table" id="tblDesc"></table></div></details>
        </div>
        <div class="kpi-card">
          <h2 class="kpi-h">Place of Calibration</h2>
          <p class="kpi-sub">Share of in-laboratory and on-site calibrations.</p>
          <div id="placeSplit"></div>
          <div class="kpi-scroll" style="margin-top:12px"><table class="kpi-table" id="tblPlace"></table></div>
          <p class="kpi-note">Classified from the free-text Place of Calibration: values starting with “On-site/On site” are on-site; values naming a lab are in-laboratory.</p>
        </div>
      </div>

      <!-- 7 -->
      <div class="kpi-card">
        <h2 class="kpi-h">Client Distribution</h2>
        <p class="kpi-sub">Requests per client and per province; repeat clients have more than one distinct request.</p>
        <div class="kpi-grid-2">
          <div id="chClients" class="kpi-chart" style="min-height:420px"></div>
          <div>
            <div class="kpi-scroll" style="max-height:200px"><table class="kpi-table" id="tblProvince"></table></div>
            <div class="kpi-scroll" style="max-height:200px;margin-top:12px"><table class="kpi-table" id="tblClients"></table></div>
          </div>
        </div>
        <p class="kpi-note">Province is detected from the customer address; addresses that name no province or known city are “Unspecified”.</p>
      </div>

      <!-- 9 + 10 -->
      <div class="kpi-grid-2">
        <div class="kpi-card">
          <h2 class="kpi-h">Personnel Workload</h2>
          <p class="kpi-sub">Worksheets per Calibration Officer and per Verifier (Checked By).</p>
          <div class="seg" id="workGroup" style="margin-bottom:8px"><button data-v="officer" class="on">Calibration officers</button><button data-v="verifier">Verifiers</button></div>
          <div class="kpi-scroll"><table class="kpi-table" id="tblWork"></table></div>
        </div>
        <div class="kpi-card">
          <h2 class="kpi-h">Verification Return Rate</h2>
          <p class="kpi-sub">Share of submitted worksheets returned by the verifier for correction.</p>
          <div class="kpi-scroll"><table class="kpi-table" id="tblReturn"></table></div>
          <p class="kpi-note">The system keeps no status history. A worksheet counts as returned if it is <code>For Correction</code> now or still carries verifier comments; as submitted if it has left <code>Pending</code> or was returned.</p>
        </div>
      </div>

      <!-- 11 -->
      <div class="kpi-card">
        <div class="head-row">
          <div><h2 class="kpi-h">Recalibration Due Instruments</h2>
            <p class="kpi-sub">Client instruments whose Recommended Due Date falls within the window (not filtered by Date Received).</p></div>
          <div class="seg" id="dueWindow"><button data-v="30" class="on">Next 30 days</button><button data-v="60">Next 60 days</button><button data-v="overdue">Overdue (last 90 days)</button></div>
        </div>
        <div class="kpi-scroll"><table class="kpi-table" id="tblDue"></table></div>
      </div>

      <!-- 12 -->
      <div class="kpi-card">
        <h2 class="kpi-h">Certificates Issued and QR Verifications</h2>
        <p class="kpi-sub">Certificates by Date of Issue per month; QR scans per final certificate from the verification log.</p>
        <div class="kpi-grid-2">
          <div id="chCerts" class="kpi-chart"></div>
          <div class="kpi-scroll"><table class="kpi-table" id="tblQr"></table></div>
        </div>
      </div>

      <!-- 13 -->
      <div class="kpi-card">
        <div class="head-row">
          <div><h2 class="kpi-h">Reference Standard Validity</h2>
            <p class="kpi-sub">Standards past or nearing their calibration expiry (next calibration date, or calibration date + 1 year).</p></div>
          <div>
            <div class="seg" id="stdWindow"><button data-v="attention" class="on">Expired + due ≤ 60 days</button><button data-v="all">All</button></div>
            <label class="kpi-note" style="margin-left:8px"><input type="checkbox" id="stdInactive"> include inactive</label>
          </div>
        </div>
        <div class="kpi-scroll"><table class="kpi-table" id="tblStd"></table></div>
      </div>
    </div>
  </div>
</div>

<!-- Settings -->
<div class="modal fade" id="kpiSettings" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">KPI settings</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <p class="small text-muted">Saved in this browser only.</p>
        <h6>Prescribed processing period (working days)</h6>
        <div class="row g-2" id="setPeriods"></div>
        <div class="row g-2 mt-2">
          <div class="col-md-4"><label class="small">Flag as “nearing” at (% of period)</label><input type="number" min="1" max="100" class="form-control form-control-sm" id="setNear"></div>
        </div>
        <h6 class="mt-3">Non-working holidays</h6>
        <p class="small text-muted mb-1">One date per line (YYYY-MM-DD). Saturdays and Sundays are always excluded.</p>
        <textarea class="form-control form-control-sm" rows="6" id="setHolidays"></textarea>
      </div>
      <div class="modal-footer">
        <button class="btn btn-sm btn-outline-secondary" id="setReset">Reset defaults</button>
        <button class="btn btn-sm btn-primary" id="setSave" data-bs-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<?= view('layouts/footer-essential'); ?>
<script>window.KPI_DATA_URL = '<?= base_url('/kpi/data') ?>';</script>
<script src="<?= base_url('/js/kpi-v1.0.js') ?>"></script>
