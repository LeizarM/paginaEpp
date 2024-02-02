var prueba = 0;

var ancho;
var calto;
var cancho;
var resultados = new Array();
var irpaso2;
var orienta;

var fila1 = new Array();
var col1 = new Array();
var sob_alto1 = new Array();
var sob_ancho1 = new Array();
var c_alto = new Array();
var c_ancho = new Array();

var fila_f = new Array();
var col_f = new Array();
var sob_alto_f = new Array();
var sob_ancho_f = new Array();
var c_alto_f = new Array();
var c_ancho_f = new Array();

var grafica = new Array();
var total1 = "";
var grafica_f = "";
var grafica_f2 = "";
var s2 = "";

var a;
var b;
var c;
var d;

var a1;
var b1;
var c1;
var d1;

var style1;
var style2;
var uno = 0;

function limpia_corte() {
    $('#alto').val('');
    $('#ancho').val('');
    $('#altoc').val('');
    $('#anchoc').val('');
    $('#tam').html('');
    $('#uso').html('');
    $('#perd').html('');
    $('#tablaf').html('');
}
function estilo() {
    if (grafica_f == 1) {
        w = (ancho - sob_ancho_f[0]) / ancho;
        w = w * 100;
        w = Math.floor(w);

        h = (alto - sob_alto_f[0]) / alto;
        h = h * 100;
        h = Math.floor(h);
        style1 = "width:" + w + "%;height:" + h + "%;";
    } else {
        if (sob_ancho_f[0] == 0) {
            w = "100";
        } else {
            w = (ancho - sob_ancho_f[0]) / ancho;
            w = w * 100;
            w = Math.floor(w);
        }
        if (sob_alto_f[0] == 0) {
            h = "100";
        } else {
            h = (alto - sob_alto_f[0]) / alto;
            h = h * 100;
            h = Math.floor(h);
        }
        style1 = "width:" + w + "%;height:" + h + "%;";

        if (sob_ancho_f[1] == 0) {
            w = "100";
        } else {
            w = (ancho - sob_ancho_f[1]) / ancho;
            w = w * 100;
            w = Math.floor(w);
        }
        if (sob_alto_f[1] == 0) {
            h = "100";
        } else {
            h = (alto - sob_alto_f[1]) / alto;
            h = h * 100;
            h = Math.floor(h);
        }
        style2 = "width:" + w + "%;height:" + h + "%;";

    }
}
function graficar() {
    var tabla = "";
    var g1 = "";
    var g2 = "";
    var an = "";

    estilo();
    g1 = creatabla(fila_f[0], col_f[0], style1);
    if (fila_f[1] > 0) {
        g2 = creatabla(fila_f[1], col_f[1], style2);
    } else {
        g2 = "";
    }

    af = (280 * alto) / ancho;
    af = Math.floor(af);

    tabla = "<div id='altog'>" + alto + "</div>";
    if (grafica_f == 1) {
        tabla = tabla + "<table id='tablappal' style='height:" + af + "px !important;max-width:100% !important;'><tr><td>" + g1 + "</td></tr></table>";
    } else if (grafica_f == 2) {
        auxalto = col_f[0] * c_alto_f[0];
        auxalto = (auxalto * 100) / alto;
        auxalto = Math.floor(auxalto);

        an = col_f[0] * c_ancho_f[0];
        an = an / alto;
        an = an * 100;
        an = Math.floor(an);

        tabla = tabla + "<table id='tablappal' style='height:" + af + "px !important;max-width:100% !important;'><tr height=" + auxalto + "%><td width='" + an + "%'>" + g1 + "</td></tr><tr><td>" + g2 + "</td></tr></table>";
    } else {
        an = fila_f[0] * c_ancho_f[0];
        an = an / ancho;
        an = an * 100;
        an = Math.floor(an);
        tabla = tabla + "<table id='tablappal' style='height:" + af + "px !important;max-width:100% !important;'><tr><td width='" + an + "%'>" + g1 + "</td><td>" + g2 + "</td></tr></table>";
    }
    $("#tablaf").html(tabla + "<div id='anchog'>" + ancho + "</div>");
}
function creatabla(col, fil, style) {

    var con = "";
    var tabla2 = "";
    var i = 0;
    var j = 0;
    con = "";
    for (i = 0; i < fil; i++) {
        con = con + "<tr>";
        for (j = 0; j < col; j++) {
            con = con + "<td>&nbsp;</td>";
        }
        con = con + "</tr>";
    }

    var tabla2 = "<table style='" + style + "' class='tablasec'>" + con + "</table>";
    return tabla2;
}

function calcular_corte() {
    var aux = "";
    var aux2 = "";
    alto = $("#alto").val();
    ancho = $("#ancho").val();
    calto = $("#altoc").val();
    cancho = $("#anchoc").val();

    if (alto > 1 && ancho > 1 && calto > 1 && cancho > 1) {

        alto = alto.replace(',', '.');
        ancho = ancho.replace(',', '.');
        calto = calto.replace(',', '.');
        cancho = cancho.replace(',', '.');

        if (parseFloat(alto) > parseFloat(ancho)) {
            $("#alto").val(ancho);
            $("#ancho").val(alto);
            aux = alto;
            alto = ancho;
            ancho = aux;
        }

        if (parseFloat(calto) > parseFloat(cancho)) {
            $("#altoc").val(cancho);
            $("#anchoc").val(calto);
            aux = calto;
            calto = cancho;
            cancho = aux;
        }

        resultados[0] = paso1();
        resultados[1] = paso2(0, 1, 2);
        resultados[2] = paso3(3, 4, 5);
        resultados[3] = paso4(6, 7, 8);

        asignar1();

        //cambio el papel de corte
        fila1 = new Array();
        col1 = new Array();
        sob_alto1 = new Array();
        sob_ancho1 = new Array();
        c_alto = new Array();
        c_ancho = new Array();
        grafica = new Array();

        aux = calto;
        calto = cancho;
        cancho = aux;

        resultados[0] = paso1();
        resultados[1] = paso2(0, 1, 2);
        resultados[2] = paso3(3, 4, 5);
        resultados[3] = paso4(6, 7, 8);

        if (resultados[0] > resultados[1]) {
            if (resultados[0] > resultados[2]) {
                if (resultados[0] >= resultados[3]) {
                    grafica_f2 = grafica[0];
                    s2 = 1;
                } else {
                    grafica_f2 = grafica[8];
                    s2 = 4;
                }
            } else if (resultados[2] >= resultados[3]) {
                grafica_f2 = grafica[5];
                s2 = 3;
            } else {
                grafica_f2 = grafica[8];
                s2 = 4;
            }
        } else if (resultados[1] > resultados[2]) {
            if (resultados[1] >= resultados[3]) {
                grafica_f2 = grafica[2];
                s2 = 2;
            } else {
                grafica_f2 = grafica[8];
                s2 = 4;
            }
        } else if (resultados[2] >= resultados[3]) {
            grafica_f2 = grafica[5];
            s2 = 3;
        } else {
            grafica_f2 = grafica[8];
            s2 = 4;
        }

        //comparo que lado me da mejor resultado	
        if (s2 == 1) {
            aux = resultados[0];
        } else if (s2 == 2) {
            aux = resultados[1];
        } else if (s2 == 3) {
            aux = resultados[2];
        } else {
            aux = resultados[3];
        }
        //nuevo
        if (s2 > 1) {
            if (resultados[0] == aux) {
                aux = resultados[0];
            }
            if (total1 == aux) {
                if (uno == 0) {
                    asignar1();
                }
            }
        }
        if (total1 < aux) {
            asignar1();
        }

        //fin nuevo	

        var atot = alto * ancho;
        var auso = (calto * cancho) * total1;
        var ades = atot - auso;

        var pu = (auso / atot) * 100;
        var pd = (ades / atot) * 100;
        $("#tam").html(total1);
        $("#uso").html(parseFloat(pu).toFixed(2) + "%");
        $("#perd").html(parseFloat(pd).toFixed(2) + "%");

        graficar();
    } else {
        swal({
            title: '¡ERROR!',
            text: 'Asegurese que los datos ingresados en la calculadora de corte sean correctos.',
            type: 'error',
            confirmButtonText: 'Cerrar',
            closeOnConfirm: false
        }

        );
    }




}
function asignar1() {
    uno = 0;

    if (resultados[0] > resultados[1]) {
        if (resultados[0] > resultados[2]) {
            if (resultados[0] >= resultados[3]) {
                fila_f[0] = fila1[0];
                col_f[0] = col1[0];
                sob_alto_f[0] = sob_alto1[0];
                sob_ancho_f[0] = sob_ancho1[0];
                c_alto_f[0] = c_alto[0];
                c_ancho_f[0] = c_ancho[0];
                grafica_f = grafica[0];

                total1 = col_f[0] * fila_f[0];
                uno = 1;
            } else {
                fila_f[0] = fila1[7];
                col_f[0] = col1[7];
                sob_alto_f[0] = sob_alto1[7];
                sob_ancho_f[0] = sob_ancho1[7];
                c_alto_f[0] = c_alto[7];
                c_ancho_f[0] = c_ancho[7];

                fila_f[1] = fila1[8];
                col_f[1] = col1[8];
                sob_alto_f[1] = sob_alto1[8];
                sob_ancho_f[1] = sob_ancho1[8];
                c_alto_f[1] = c_alto[8];
                c_ancho_f[1] = c_ancho[8];
                grafica_f = grafica[8];

                total1 = (col_f[0] * fila_f[0]) + (col_f[1] * fila_f[1]);
            }
        } else {
            if (resultados[2] > resultados[3]) {
                fila_f[0] = fila1[4];
                col_f[0] = col1[4];
                sob_alto_f[0] = sob_alto1[4];
                sob_ancho_f[0] = sob_ancho1[4];
                c_alto_f[0] = c_alto[4];
                c_ancho_f[0] = c_ancho[4];

                fila_f[1] = fila1[5];
                col_f[1] = col1[5];
                sob_alto_f[1] = sob_alto1[5];
                sob_ancho_f[1] = sob_ancho1[5];
                c_alto_f[1] = c_alto[5];
                c_ancho_f[1] = c_ancho[5];
                grafica_f = grafica[5];

                total1 = (col_f[0] * fila_f[0]) + (col_f[1] * fila_f[1]);
            } else {
                fila_f[0] = fila1[7];
                col_f[0] = col1[7];
                sob_alto_f[0] = sob_alto1[7];
                sob_ancho_f[0] = sob_ancho1[7];
                c_alto_f[0] = c_alto[7];
                c_ancho_f[0] = c_ancho[7];

                fila_f[1] = fila1[8];
                col_f[1] = col1[8];
                sob_alto_f[1] = sob_alto1[8];
                sob_ancho_f[1] = sob_ancho1[8];
                c_alto_f[1] = c_alto[8];
                c_ancho_f[1] = c_ancho[8];
                grafica_f = grafica[8];

                total1 = (col_f[0] * fila_f[0]) + (col_f[1] * fila_f[1]);
            }
        }
    } else if (resultados[1] > resultados[2]) {
        if (resultados[1] >= resultados[3]) {
            fila_f[0] = fila1[1];
            col_f[0] = col1[1];
            sob_alto_f[0] = sob_alto1[1];
            sob_ancho_f[0] = sob_ancho1[1];
            c_alto_f[0] = c_alto[1];
            c_ancho_f[0] = c_ancho[1];

            fila_f[1] = fila1[2];
            col_f[1] = col1[2];
            sob_alto_f[1] = sob_alto1[2];
            sob_ancho_f[1] = sob_ancho1[2];
            c_alto_f[1] = c_alto[2];
            c_ancho_f[1] = c_ancho[2];
            grafica_f = grafica[2];

            total1 = (col_f[0] * fila_f[0]) + (col_f[1] * fila_f[1]);
        } else {
            fila_f[0] = fila1[7];
            col_f[0] = col1[7];
            sob_alto_f[0] = sob_alto1[7];
            sob_ancho_f[0] = sob_ancho1[7];
            c_alto_f[0] = c_alto[7];
            c_ancho_f[0] = c_ancho[7];

            fila_f[1] = fila1[8];
            col_f[1] = col1[8];
            sob_alto_f[1] = sob_alto1[8];
            sob_ancho_f[1] = sob_ancho1[8];
            c_alto_f[1] = c_alto[8];
            c_ancho_f[1] = c_ancho[8];
            grafica_f = grafica[8];

            total1 = (col_f[0] * fila_f[0]) + (col_f[1] * fila_f[1]);
        }
    } else {
        if (resultados[2] >= resultados[3]) {
            fila_f[0] = fila1[4];
            col_f[0] = col1[4];
            sob_alto_f[0] = sob_alto1[4];
            sob_ancho_f[0] = sob_ancho1[4];
            c_alto_f[0] = c_alto[4];
            c_ancho_f[0] = c_ancho[4];

            fila_f[1] = fila1[5];
            col_f[1] = col1[5];
            sob_alto_f[1] = sob_alto1[5];
            sob_ancho_f[1] = sob_ancho1[5];
            c_alto_f[1] = c_alto[5];
            c_ancho_f[1] = c_ancho[5];
            grafica_f = grafica[5];

            total1 = (col_f[0] * fila_f[0]) + (col_f[1] * fila_f[1]);
        } else {
            fila_f[0] = fila1[7];
            col_f[0] = col1[7];
            sob_alto_f[0] = sob_alto1[7];
            sob_ancho_f[0] = sob_ancho1[7];
            c_alto_f[0] = c_alto[7];
            c_ancho_f[0] = c_ancho[7];

            fila_f[1] = fila1[8];
            col_f[1] = col1[8];
            sob_alto_f[1] = sob_alto1[8];
            sob_ancho_f[1] = sob_ancho1[8];
            c_alto_f[1] = c_alto[8];
            c_ancho_f[1] = c_ancho[8];
            grafica_f = grafica[8];

            total1 = (col_f[0] * fila_f[0]) + (col_f[1] * fila_f[1]);
        }
    }
    if (uno == 0) {
        //console.log("resultados[0] ",resultados[0]);							
        if (resultados[0] == total1) {
            uno = 1;
            fila_f[0] = fila1[0];
            col_f[0] = col1[0];
            sob_alto_f[0] = sob_alto1[0];
            sob_ancho_f[0] = sob_ancho1[0];
            c_alto_f[0] = c_alto[0];
            c_ancho_f[0] = c_ancho[0];
            grafica_f = grafica[0];

            total1 = col_f[0] * fila_f[0];

            fila_f[1] = 0;
            col_f[1] = 0;
        }
    }

}
function calculo(nalto, nancho, tipo) {
    var alt = alto;
    var anc = ancho;

    if (nalto > 0) {
        alt = nalto;
    }
    if (nancho > 0) {
        anc = nancho;
    }

    a = alt / calto;
    c = Math.floor(a);

    b = anc / cancho;
    d = Math.floor(b);

    a = alt - (calto * c);
    b = anc - (cancho * d);

    a = parseFloat(a).toFixed(2);
    b = parseFloat(b).toFixed(2);



    if (tipo == 2) {
        a1 = alt / cancho;
        c1 = Math.floor(a1);

        b1 = anc / calto;
        d1 = Math.floor(b1);

        a1 = alt - (cancho * c1);
        b1 = anc - (calto * d1);

        a1 = parseFloat(a1).toFixed(2);
        b1 = parseFloat(b1).toFixed(2);

        if ((c1 * d1) > (c * d)) {
            a = a1;
            b = b1;
            c = c1;
            d = d1;
            orienta = 2;
        } else {
            orienta = 1;
        }

    }
}
function paso1() {
    var l1 = 0;
    var l2 = 0;

    calculo(0, 0, 1);

    if (parseFloat(calto) <= parseFloat(a) || parseFloat(cancho) <= parseFloat(a)) {
        l1 = 1;
    }
    if (parseFloat(calto) <= parseFloat(b) || parseFloat(cancho) <= parseFloat(b)) {
        l2 = 1;
    }

    if (l1 == 1 && l2 == 1) {
        irpaso2 = 3;
    } else if (l1 == 1) {
        irpaso2 = 1;
    } else if (l2 == 1) {
        irpaso2 = 2;
    } else {
        irpaso2 = 0;
    }

    sob_alto1[0] = a;
    sob_ancho1[0] = b;
    col1[0] = c;
    fila1[0] = d;
    c_alto[0] = calto;
    c_ancho[0] = cancho;

    grafica[0] = 1;

    return c * d;
}
function paso2(p1, n1, n2) {
    var aux;
    if (irpaso2 > 0) {
        col1[n1] = col1[p1];
        fila1[n1] = fila1[p1];
        c_alto[n1] = c_alto[p1];
        c_ancho[n1] = c_ancho[p1];

        if (irpaso2 == 1) {
            calculo(sob_alto1[p1], 0, 2);
            grafica[n2] = 2;

            sob_alto1[n1] = 0;
            sob_ancho1[n1] = sob_ancho1[p1];
        } else if (irpaso2 == 2) {
            calculo(0, sob_ancho1[p1], 2);
            grafica[n2] = 3;

            sob_alto1[n1] = sob_alto1[p1];
            sob_ancho1[n1] = 0;
        } else {
            calculo(sob_alto1[p1], 0, 2);
            aux = c * d;
            calculo(0, sob_ancho1[p1], 2);

            if (aux > (c * d)) {
                calculo(sob_alto1[p1], 0, 2);
                grafica[n2] = 2;

                sob_alto1[n1] = 0;
                sob_ancho1[n1] = sob_ancho1[p1];
            } else {
                grafica[n2] = 3;

                sob_alto1[n1] = sob_alto1[p1];
                sob_ancho1[n1] = 0;
            }
        }

        sob_alto1[n2] = a;
        sob_ancho1[n2] = b;
        col1[n2] = c;
        fila1[n2] = d;
        if (orienta == 1) {
            c_alto[n2] = calto;
            c_ancho[n2] = cancho;
        } else {
            c_alto[n2] = cancho;
            c_ancho[n2] = calto;
        }

        return (c * d) + (col1[n1] * fila1[n1]);

    } else {
        return 0;
    }
}
function paso3(p1, n1, n2) {
    prueba = 1;
    var l1 = 0;
    var l2 = 0;
    var final = 0;
    var aux;
    var paso = 0;

    for (i = 1; i < fila1[0] - 1; i++) {
        a = col1[0];
        b = fila1[0] - i;

        c = calto * a;
        d = cancho * b;

        a1 = alto - c;
        b1 = ancho - d;

        sob_alto1[p1] = a1;
        sob_ancho1[p1] = b1;
        col1[p1] = a;
        fila1[p1] = b;
        c_alto[p1] = calto;
        c_ancho[p1] = cancho;

        if (parseFloat(calto) <= parseFloat(a1) || parseFloat(cancho) <= parseFloat(a1)) {
            l1 = 1;
        }
        if (parseFloat(calto) <= parseFloat(b1) || parseFloat(cancho) <= parseFloat(b1)) {
            l2 = 1;
        }


        if (l1 == 1 && l2 == 1) {
            irpaso2 = 3;
        } else if (l1 == 1) {
            irpaso2 = 1;
        } else if (l2 == 1) {
            irpaso2 = 2;
        } else {
            irpaso2 = 0;
        }
        aux = paso2(p1, n1, n2);
        if (aux > final) {
            final = aux;
            paso = i;
        }
    }

    a = col1[0];
    b = fila1[0] - paso;

    c = calto * a;
    d = cancho * b;

    a1 = alto - c;
    b1 = ancho - d;

    sob_alto1[p1] = a1;
    sob_ancho1[p1] = b1;
    col1[p1] = a;
    fila1[p1] = b;
    c_alto[p1] = calto;
    c_ancho[p1] = cancho;

    if (parseFloat(calto) <= parseFloat(a1) || parseFloat(cancho) <= parseFloat(a1)) {
        l1 = 1;
    }
    if (parseFloat(calto) <= parseFloat(b1) || parseFloat(cancho) <= parseFloat(b1)) {
        l2 = 1;
    }

    if (l1 == 1 && l2 == 1) {
        irpaso2 = 3;
    } else if (l1 == 1) {
        irpaso2 = 1;
    } else if (l2 == 1) {
        irpaso2 = 2;
    } else {
        irpaso2 = 0;
    }
    return paso2(p1, n1, n2);
}
function paso4(p1, n1, n2) {
    var l1 = 0;
    var l2 = 0;
    var final = 0;
    var aux;
    var paso = 0;

    for (i = 1; i < col1[0] - 1; i++) {
        a = col1[0] - i;
        b = fila1[0];
        c = calto * a;
        d = cancho * b;

        a1 = alto - c;
        b1 = ancho - d;
        sob_alto1[p1] = a1;
        sob_ancho1[p1] = b1;
        col1[p1] = a;
        fila1[p1] = b;
        c_alto[p1] = calto;
        c_ancho[p1] = cancho;

        if (parseFloat(calto) <= parseFloat(a1) || parseFloat(cancho) <= parseFloat(a1)) {
            l1 = 1;
        }
        if (parseFloat(calto) <= parseFloat(b1) || parseFloat(cancho) <= parseFloat(b1)) {
            l2 = 1;
        }

        if (l1 == 1 && l2 == 1) {
            irpaso2 = 3;
        } else if (l1 == 1) {
            irpaso2 = 1;
        } else if (l2 == 1) {
            irpaso2 = 2;
        } else {
            irpaso2 = 0;
        }

        aux = paso2(p1, n1, n2);
        if (aux > final) {
            final = aux;
            paso = i;
        }
    }

    a = col1[0] - paso;
    b = fila1[0];
    c = calto * a;
    d = cancho * b;

    a1 = alto - c;
    b1 = ancho - d;
    sob_alto1[p1] = a1;
    sob_ancho1[p1] = b1;
    col1[p1] = a;
    fila1[p1] = b;
    c_alto[p1] = calto;
    c_ancho[p1] = cancho;

    if (parseFloat(calto) <= parseFloat(a1) || parseFloat(cancho) <= parseFloat(a1)) {
        l1 = 1;
    }
    if (parseFloat(calto) <= parseFloat(b1) || parseFloat(cancho) <= parseFloat(b1)) {
        l2 = 1;
    }

    if (l1 == 1 && l2 == 1) {
        irpaso2 = 3;
    } else if (l1 == 1) {
        irpaso2 = 1;
    } else if (l2 == 1) {
        irpaso2 = 2;
    } else {
        irpaso2 = 0;
    }
    return paso2(p1, n1, n2);
}
