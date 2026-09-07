function average(a) {
    let b = a.length;
    var c = 0;
    for (x = 0; x < b; x++) c += parseFloat(a[x]);
    return c / b;
}
function stdDev(a) {
    try {
        var c = 0,
            d = [],
            g = 0,
            h = 0;
        for (let b = 0; b < a.length; b++) (c += parseFloat(a[b])), b == a.length - 1 && (c /= a.length);
        for (let e = 0; e < a.length; e++) {
            var i = Math.pow(parseFloat(a[e]) - c, 2);
            d.push(i);
        }
        for (let f = 0; f < d.length; f++) g += d[f];
        return (h = g / (a.length - 1)), Math.sqrt(h);
    } catch (j) {
        return console.log("Error: ", j), 0;
    }
}
function sumOfArrays(a) {
    return a.reduce((a, b) => a + b, 0);
}
function convertUnit(a, c, b) {
    try {
        switch (c) {
            case "mg":
                switch (b) {
                    case "g":
                        converted = a / 1e3;
                        break;
                    case "kg":
                        converted = a / 1e6;
                        break;
                    default:
                        converted = a;
                }
                break;
            case "g":
                switch (b) {
                    case "mg":
                        converted = 1e3 * a;
                        break;
                    case "kg":
                        converted = a / 1e3;
                        break;
                    default:
                        converted = a;
                }
                break;
            case "kg":
                switch (b) {
                    case "mg":
                        converted = 1e6 * a;
                        break;
                    case "g":
                        converted = 1e3 * a;
                        break;
                    default:
                        converted = a;
                }
                break;
            default:
                converted = a;
        }
        return converted;
    } catch (d) {
        return console.log("Error: ", d), 0;
    }
}
function linearityTestUN(b, c) {
    var a;
    try {
        a = b / c;
    } catch (d) {
        console.log("Error in linearityTestUN: ", d), (a = 0);
    }
    return a;
}
function uncertaintyReferenceWeights(b) {
    var a;
    try {
        a = b / 1e3;
    } catch (c) {
        console.log("Error in uncertaintyReferenceWeights: ", c), (a = 0);
    }
    return a;
}
function uncertaintyReferenceWeightsSensitivityTest() {
    var a;
    try {
        a = document.getElementById("sensitivityU").value / 2e3;
    } catch (b) {
        console.log("Error in uncertaintyReferenceWeightsSensitivityTest: ", b), (a = 0);
    }
    return a;
}
function uncertaintySDSensitivityTest() {
    var a;
    try {
        a = Math.max(parseFloat(document.getElementById("sensitivityEmptyStandardDev").value), parseFloat(document.getElementById("sensitivityMaxStandardDev").value)) / Math.sqrt(5);
    } catch (b) {
        console.log("Error in uncertaintySDSensitivityTest: ", b), (a = 0);
    }
    return a;
}
function uncertaintySensitivity(b, c) {
    var a;
    try {
        a = Math.sqrt(Math.pow(b, 2) + Math.pow(c, 2));
    } catch (d) {
        console.log("Error in uncertaintySensitivity: ", d), (a = 0);
    }
    return a;
}
function uncertaintyReadability() {
    var a;
    try {
        var b = document.getElementById("readability").value,
            c = document.getElementById("readabilityUnit").value,
            d = document.getElementById("readabilityX").value;
        "mg" == c && (a = (b * d) / 1e3 / Math.sqrt(3)), "g" == c && (a = (b * d) / Math.sqrt(3)), "kg" == c && (a = (b * d * 1e3) / Math.sqrt(3));
    } catch (e) {
        console.log("Error in uncertaintyReadability: ", e), (a = 0);
    }
    return a;
}
function uncertaintyEccenticity() {
    var a;
    try {
        var b = document.getElementById("eccentricityIndicationUnit").value,
            e = parseFloat(document.getElementById("eccentricityErrorPosition2").value),
            f = parseFloat(document.getElementById("eccentricityErrorPosition3").value),
            g = parseFloat(document.getElementById("eccentricityErrorPosition4").value),
            h = parseFloat(document.getElementById("eccentricityErrorPosition5").value),
            c = Math.min(e, f, g, h),
            d = Math.max(e, f, g, h);
        "mg" == b && (a = (d - c) / (2 * Math.sqrt(3) * 1e3)), "g" == b && (a = (d - c) / (2 * Math.sqrt(3))), "kg" == b && (a = ((d - c) * 1e3) / (2 * Math.sqrt(3)));
    } catch (i) {
        console.log("Error in uncertaintyEccenticity: ", i), (a = 0);
    }
    return a;
}
function uncertaintyBalance(b, c, d) {
    var a;
    try {
        a = Math.sqrt(Math.pow(b, 2) + Math.pow(c, 2) + Math.pow(d, 2));
    } catch (e) {
        console.log("Error in uncertaintyBalance: ", e), (a = 0);
    }
    return a;
}
function uncertaintyRepeatability() {
    var a;
    try {
        var b = document.getElementById("repeatabilityIndicationUnit").value,
            c = parseFloat(document.getElementById("repeatabilitySD").value);
        // "mg" == b && (a = c / Math.sqrt(10) / 1e3), "g" == b && (a = c / Math.sqrt(10)), "kg" == b && (a = (1e3 * c) / Math.sqrt(10));
        "mg" == b && (a = c / 1e3), "g" == b && (a = c ), "kg" == b && (a = (1e3 * c));
    } catch (d) {
        console.log("Error in uncertaintyRepeatability: ", d), (a = 0);
    }
    return a;
}
function combinedUncertainty(b, c, d) {
    var a;
    try {
        a = Math.sqrt(Math.pow(b, 2) + Math.pow(c, 2) + Math.pow(d, 2));
    } catch (e) {
        console.log("Error in combinedUncertainty: ", e), (a = 0);
    }
    return a;
}
function expandedUncertainty(b) {
    var a;
    try {
        a = 2 * b;
    } catch (c) {
        console.log("Error in expandedUncertainty: ", c), (a = 0);
    }
    return a;
}
