function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
};

function getSum(room_count_1, room_count_2) {
    return room_count_1 + room_count_2;
}

function selectRooms() {
    var room_count_array = [];
    var room_price_array = [];

    for (var i = 1; i <= 20; i++) {
        if ($('#select-room-' + i).length) {
            var room_count = Number(document.getElementById("select-room-" + i).value);
        } else {
            var room_count = 0;
        }

        room_count_array.push(room_count);

        $('#rt' + i).val(room_count);

        if (room_count != 0) {
            var room_price = Number($("#select-room-" + i).data("price")) * room_count;
        } else {
            var room_price = 0;
        }

        room_price_array.push(room_price);
    }

    var total_room_count = room_count_array.reduce(getSum);
    var total_room_price = room_price_array.reduce(getSum);

    document.getElementById("number-room").innerHTML = "Tổng giá: " + total_room_count + " phòng:";
    document.getElementById("number-room-hidden").innerHTML = total_room_count;
    $('#number-room-hidden').val(total_room_count);

    document.getElementById("price-total").innerHTML = formatNumber(total_room_price) + "VNĐ";
    $('#total-money-hidden').val(total_room_price);
};