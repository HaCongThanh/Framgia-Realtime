function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
};

function selectRooms() {
    if ($('#select-room-1').length) {
        var r1 = Number(document.getElementById("select-room-1").value);
    } else {
        var r1 = 0;
    }
    $('#rt1').val(r1);

    if ($('#select-room-2').length) {
        var r2 = Number(document.getElementById("select-room-2").value);
    } else {
        var r2 = 0;
    }
    $('#rt2').val(r2);

    if ($('#select-room-3').length) {
        var r3 = Number(document.getElementById("select-room-3").value);
    } else {
        var r3 = 0;
    }
    $('#rt3').val(r3);

    if ($('#select-room-4').length) {
        var r4 = Number(document.getElementById("select-room-4").value);
    } else {
        var r4 = 0;
    }
    $('#rt4').val(r4);

    if ($('#select-room-5').length) {
        var r5 = Number(document.getElementById("select-room-5").value);
    } else {
        var r5 = 0;
    }
    $('#rt5').val(r5);

    if ($('#select-room-6').length) {
        var r6 = Number(document.getElementById("select-room-6").value);
    } else {
        var r6 = 0;
    }
    $('#rt6').val(r6);

    if ($('#select-room-7').length) {
        var r7 = Number(document.getElementById("select-room-7").value);
    } else {
        var r7 = 0;
    }
    $('#rt7').val(r7);

    if ($('#select-room-8').length) {
        var r8 = Number(document.getElementById("select-room-8").value);
    } else {
        var r8 = 0;
    }
    $('#rt8').val(r8);

    if ($('#select-room-9').length) {
        var r9 = Number(document.getElementById("select-room-9").value);
    } else {
        var r9 = 0;
    }
    $('#rt9').val(r9);

    if ($('#select-room-10').length) {
        var r10 = Number(document.getElementById("select-room-10").value);
    } else {
        var r10 = 0;
    }
    $('#rt10').val(r10);

    var r = r1 + r2 + r3 + r4 + r5 + r6 + r7 + r8 + r9 + r10;
    document.getElementById("number-room").innerHTML = "Tổng giá: " + r + " phòng:";
    document.getElementById("number-room-hidden").innerHTML = r;
    $('#number-room-hidden').val(r);

    if (r1 != 0) {
        var p1 = Number($("#select-room-1").data("price")) * r1;
    } else {
        var p1 = 0;
    }

    if (r2 != 0) {
        var p2 = Number($("#select-room-2").data("price")) * r2;
    } else {
        var p2 = 0;
    }

    if (r3 != 0) {
        var p3 = Number($("#select-room-3").data("price")) * r3;
    } else {
        var p3 = 0;
    }

    if (r4 != 0) {
        var p4 = Number($("#select-room-4").data("price")) * r4;
    } else {
        var p4 = 0;
    }

    if (r5 != 0) {
        var p5 = Number($("#select-room-5").data("price")) * r5;
    } else {
        var p5 = 0;
    }

    if (r6 != 0) {
        var p6 = Number($("#select-room-6").data("price")) * r6;
    } else {
        var p6 = 0;
    }

    if (r7 != 0) {
        var p7 = Number($("#select-room-7").data("price")) * r7;
    } else {
        var p7 = 0;
    }

    if (r8 != 0) {
        var p8 = Number($("#select-room-8").data("price")) * r8;
    } else {
        var p8 = 0;
    }

    if (r9 != 0) {
        var p9 = Number($("#select-room-9").data("price")) * r9;
    } else {
        var p9 = 0;
    }

    if (r10 != 0) {
        var p10 = Number($("#select-room-10").data("price")) * r10;
    } else {
        var p10 = 0;
    }

    var p = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9 + p10;
    document.getElementById("price-total").innerHTML = formatNumber(p) + "VNĐ";
    $('#total-money-hidden').val(p);
};