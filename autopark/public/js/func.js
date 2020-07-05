

//Car
$(createCar)
function createCar() {
    $('#createCar').bind('click', function(event) {
        $.ajaxSetup({
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: $('#form').attr('action'),
            method: 'POST',
            data: {
                numberCar: $(".numberCar").val(),
                driverName: $(".driverName").val(),

            },
            success: function (response) {
                $(location).attr('href', 'carsReference');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // console.log(errorThrown);
            }
        });
    });
}

$(add_car)
function add_car(){
    $('#add_car').bind('click', function(event) {
        event.preventDefault();
        $(".carsItem").append('<div class="carDescription">\n' +
            '                    <div>\n' +
            '                        <span>Номер машины</span><br>\n' +
            '                        <input type="text" name="numberCar[]" class="numberCar" value=""><br>\n' +
            '                    </div>\n' +
            '                    <div>\n' +
            '                        <span>Имя водителя</span><br>\n' +
            '                        <input type="text" name="driverName[]" class="driverName" value="">\n' +
            '                    </div>\n' +
            '                </div>');
        //$(".Cars").append('<div class="carsItem"><div><span>Номер машины</span><br><input type="text" name="numberCar" class="numberCar"></div><div><span>Имя водителя</span><br><input type="text" name="driverName" class="driverName"></div></div></div><br>');
    });
}



$(delete_car)
function delete_car(){
    $('#delete_car').bind('click', function(event) {
        event.preventDefault();
        $('.bef:last').remove();
    });
}

function editingCar(id, idClick){
    var numberCar =  [];
    var driverName =  [];
    var el = $(".Cars").find('.carsItem').find('.numberCar');
    var size = el.length;

    for(var i=0; i < size ; i++) {
        numberCar.push($(el[i]).val());
    }
    var el = $(".Cars").find('.carsItem').find('.driverName');
    var size = el.length;

    for(var i=0; i < size ; i++) {
        driverName.push($(el[i]).val());
    }

    $.ajaxSetup({
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: $('#form').attr('action'),
        method: 'POST',
        data: {
            numberCar: numberCar[idClick],
            driverName: driverName[idClick],
            id: id,

        },
        success: function (response) {
            $(location).attr('href', 'carsReference');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // console.log(errorThrown);
        }
    });
}






//Autopark
function CreateAutopark() {
    $('#CreateAutopark').bind('click', function(event) {
        var nameAutopark = $("#nameAutopark").val();
        var address = $("#address").val();
        var schedule = $("#schedule").val();
        $.ajax({
            url: 'CreateAutopark.php',
            type: 'POST',
            data: {
                "nameAutopark":nameAutopark,
                "address":address,
                "schedule":schedule
            },
            success: function (response) {
                console.log(response);
            }
        })
        .done(function() {
            $(location).attr('href',url);
        })
    });
}




function SaveAutopark() {
    $('#SaveAutopark').bind('click', function(event) {
        var numberCar =  [];
        var driverName =  [];

        var nameAutopark = $(".nameAutopark").val();
        var address = $(".address").val();
        var schedule = $(".schedule").val();

        var el = $(".Cars").find('.carsItem').find('.numberCar');
        var size = el.length;

        for(var i=0; i < size ; i++) {
            numberCar.push($(el[i]).val());
        }
        var el = $(".Cars").find('.carsItem').find('.driverName');
        var size = el.length;

        for(var i=0; i < size ; i++) {
           driverName.push($(el[i]).val());
        }

        $.ajax({
            url: 'SaveAutopark.php',
            type: 'POST',
            data: {
                "nameAutopark":nameAutopark,
                "address":address,
                "schedule":schedule,
                "numberCar": numberCar,
                "driverName": driverName,
            },
            success: function (response) {
                var arr = JSON.parse(response);
                console.log(arr.length);
                if(arr.length > 0){
                    $(location).attr('href', 'creatingFleet.php');
                }else {
                    $(location).attr('href', url);
                }



            }
        })
        // .done(function() {
        //     $(location).attr('href',url);
        // })

    });


}




function EditingAutopark(id, idClick){
    //console.log("EditingAutopark");
    var nameAutopark = [];
    var address = [];
    var schedule = [];
    for(var i=0; i < $(".CarsEditing").find('.carsItem').find('.nameAutopark').length ; i++) {
        nameAutopark.push($($(".CarsEditing").find('.carsItem').find('.nameAutopark')[i]).val());
    }

    for(var i=0; i < $(".CarsEditing").find('.carsItem').find('.address').length ; i++) {
        address.push($($(".CarsEditing").find('.carsItem').find('.address')[i]).val());
    }

    for(var i=0; i < $(".CarsEditing").find('.carsItem').find('.schedule').length ; i++) {
        schedule.push($($(".CarsEditing").find('.carsItem').find('.schedule')[i]).val());
    }

    $.ajaxSetup({
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: $('#form').attr('action'),
        method: 'POST',
        data: {
            nameAutopark: nameAutopark[idClick],
            address: address[idClick],
            schedule: schedule[idClick],
            id: id,

        },
        success: function (response) {
            // console.log(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // console.log(errorThrown);
        }
    });


}

function deleteAuto(id){
        $.ajaxSetup({
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: $('#form').attr('action'),
            method: 'DELETE',
            data: {
                id: id
            },
            success: function (response) {
                 console.log(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });

}


function ChangeCar(id, idCars){
    var selectAutopark = [];
    for(var i = 0; i < $(`select[name="${id}"]`).val().length; i++) {
        selectAutopark.push($($(`select[name="${id}"]`)[i]).val());
    }
    $.ajaxSetup({
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax({
        url: $('#form').attr('action'),
        method: 'POST',
        data: {
            selectAutopark: selectAutopark[0],
            idCars: idCars,

        },

        success: function (response) {
            console.log(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });

}

//Page
var current_page = 0;
var size = 0;


function prevPage(amount, sizeArray)
{

    size = sizeArray;

    if (current_page > 1) {
        current_page-=amount;
    }
    $.ajaxSetup({
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: $('#form').attr('action'),
        method: 'GET',
        data: {
            prevPage: current_page
        }
    });
    changePage(current_page);
}


function nextPage(amount, sizeArray)
{
    size = sizeArray;

    if (current_page < size) {
        current_page+=amount;

    }
    if(sizeArray < current_page){
        current_page = sizeArray;
    }
    $.ajaxSetup({
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: $('#form').attr('action'),
        method: 'GET',
        data: {
            nextPage: current_page
        }
    });
    changePage(current_page);
}


function changePage(page)
{
    console.log(page);


}


window.onload = function() {
    changePage(0);
};
