var arrTotalPower = [];
var arrTotalEnergy = [];
var indexTotalPower = [];
var indexTotalEnergy = [];
var arrDefaultPower = [];
var arrDefaultEnergy = [];
var indexDefaultEnergy = [];
var indexDefaultPower = [];
var arrPrice = [0,0,0,0,0,0,0,0]; //battery = 0, netmeter = 1, inverter = 2, installation = 3, panel = 4, stand = 5, wires = 6, breakers=7
var price = 0;
var ids = [];
var indexIds = [];
var arrTempAppliance = [];
var arrTempNotNull = [];
var arrTempIndex = [];
var GrandTotalPower = 0;
var GrandTotalEnergy = 0;

var from = "template";
var dailyUsage_1 = 0;
function appliances(id, no, from) {
   
    $.ajax({
        url: allAppliances,
        success: function (msg) {
  
            var  i = $.grep(msg, function(v) {
                return v.id == id;
            });
 
            index = i[0];
            if ($("#appliance-" + id).is(":checked")) {

                ids.push(id);
               
                $("#totalPower-" + id).val(i[0].power_rating);
               
                if (from == "template") {
                    
                    $("#dailyUsage-" + id).val(arrTempNotNull[arrTempIndex.indexOf(arrTempNotNull[no][0])][1][2]);
                    var dailyUsage_1 = $("#dailyUsage-" + id).val();
                    var totalPower = i[0].power_rating;
                    qty = $('#qty-'+id).val(); 
                   
                    totalPower_1 = qty * totalPower;
                    $("#defaultPower-" + id).val(totalPower);
                    
                    $("#totalPower-" + id).val(totalPower_1);
                    totalPower_1 = $("#totalPower-" + id).val();
                    arrDefaultPower.push(totalPower_1);
                    arrTotalPower.push(totalPower_1);
                    indexTotalPower.push(arrTotalPower.indexOf(totalPower_1));
                    indexIds.push(ids.indexOf(id));
                    indexDefaultPower.push(arrDefaultPower.indexOf(totalPower_1));
                    var totalEnergy_1 = totalPower_1 * dailyUsage_1;
                    
                    $("#totalEnergy-" + id).val(totalEnergy_1);
                    var indexOfTotalEnergy = [arrTotalEnergy.indexOf(parseFloat(totalEnergy_1))];
                    arrDefaultEnergy.push(parseFloat(totalPower_1));
                    arrTotalEnergy.push(totalEnergy_1);
                    indexTotalEnergy.push(arrTotalEnergy.indexOf(totalEnergy_1));
                    indexDefaultEnergy.push(arrDefaultEnergy.indexOf(totalEnergy_1));

                    // $("#brkName").val()
                } else {
                  
                    $("#dailyUsage-" + id).val(i[0].average_usage);
                    var totalPower_1 = i[0].power_rating;
                    arrDefaultPower.push(totalPower_1);
                    arrTotalPower.push(totalPower_1);
                    indexTotalPower.push(arrTotalPower.indexOf(totalPower_1));
                    indexIds.push(ids.indexOf(id));
                    indexDefaultPower.push(arrDefaultPower.indexOf(totalPower_1));
                    $("#defaultPower-" + id).val(totalPower_1);
                    var dailyUsage_1 = i[0].average_usage;
                    var totalEnergy_1 = totalPower_1 * dailyUsage_1;
                    $("#totalEnergy-" + id).val(totalEnergy_1);
                    var indexOfTotalEnergy = [arrTotalEnergy.indexOf(parseFloat(totalEnergy_1))];
                    arrDefaultEnergy.push(parseFloat(totalPower_1));
                    arrTotalEnergy.push(totalEnergy_1);
                    indexTotalEnergy.push(arrTotalEnergy.indexOf(totalEnergy_1));
                    indexDefaultEnergy.push(arrDefaultEnergy.indexOf(totalEnergy_1));
                }
                $("#dailyUsage-" + id).change(function () {
                    GrandTotalEnergy = 0;
                    var dailyUsage_2 = $("#dailyUsage-" + id).val();
                    var subEnergy_2 = dailyUsage_2 * totalPower_1;
                    arrTotalEnergy[indexOfTotalEnergy] = subEnergy_2;
                    $("#totalEnergy-" + id).val(arrTotalEnergy[indexOfTotalEnergy]);
                    for (let index = 0; index < arrTotalEnergy.length; index++) {
                        GrandTotalEnergy = GrandTotalEnergy + arrTotalEnergy[index];
                    }
                    $("#GrandTotalEnergy").val(GrandTotalEnergy);
                });
                GrandTotalPower = 0;
                GrandTotalEnergy = 0;
                for (let index = 0; index < arrTotalPower.length; index++) {
                    GrandTotalPower = parseInt(GrandTotalPower) + parseInt(arrTotalPower[index]);
                }
                for (let index = 0; index < arrTotalEnergy.length; index++) {
                    GrandTotalEnergy = parseInt(GrandTotalEnergy) + parseInt(arrTotalEnergy[index]);
                }
                $("#GrandTotalPower").val(GrandTotalPower);
                $("#GrandTotalEnergy").val(GrandTotalEnergy);
                totalPower(id);
            } else {
                GrandTotalPower = 0;
                GrandTotalEnergy = 0;
                var power_rating = $("#appliance-" + id).val();
                var energy = $("#totalEnergy-" + id).val();
                var default_power = $("#defaultPower-" + id).val();
                var deleted_power = arrTotalPower.indexOf(parseFloat(power_rating));
                var deleted_energy = arrTotalEnergy.indexOf(parseFloat(energy));
                var deleted_Dpower = arrDefaultPower.indexOf(parseFloat(default_power));
                ids.splice(indexIds[indexTotalPower.length - 1], 1);
                indexIds.pop();
                arrTotalPower.splice(arrTotalPower.indexOf(parseFloat(power_rating)), 1);
                indexTotalPower.splice(deleted_power, 1);
                arrDefaultPower.splice([indexDefaultPower.length - 1], 1);
                indexDefaultPower.pop(deleted_Dpower);
                arrTotalEnergy.splice(arrTotalEnergy.indexOf(parseInt(energy)), 1);
                indexTotalEnergy.splice(deleted_energy, 1);
                arrDefaultEnergy.splice([indexDefaultEnergy.length - 1], 1);
                indexDefaultEnergy.splice();
                for (let index = 0; index < arrTotalPower.length; index++) {
                    GrandTotalPower = GrandTotalPower + arrTotalPower[index];
                }
                for (let index = 0; index < arrTotalEnergy.length; index++) {
                    GrandTotalEnergy = GrandTotalEnergy + arrTotalEnergy[index];
                }
                $("#GrandTotalPower").val(GrandTotalPower);
                $("#GrandTotalEnergy").val(GrandTotalEnergy);
                $("#totalPower-" + id).val("");
                $("#dailyUsage-" + id).val("");
                $("#totalEnergy-" + id).val("");
                $("#qty-" + id).val("");
            }
        },
    });
}
function quantity(id) {
    var subPower = 0;
    var subEnergy = 0;
    var qty_1 = $("#qty-" + id).val();
    var totalPower = $("#totalPower-" + id).val();
    var defaultPower = $("#defaultPower-" + id).val();
    var dailyUsage = $("#dailyUsage-" + id).val();
    var totalEnergy = $("#totalEnergy-" + id).val();
    var indexOfTotalPower = [arrTotalPower.indexOf(parseFloat(totalPower))];
    var indexOfTotalEnergy = [arrTotalEnergy.indexOf(parseFloat(totalEnergy))];
    var sTPower = arrTotalPower[indexOfTotalPower];
    subPower = qty_1 * defaultPower;
    subEnergy = dailyUsage * subPower;
    arrTotalPower[indexOfTotalPower] = subPower;
    arrTotalEnergy[indexOfTotalEnergy] = subEnergy;
    $("#totalPower-" + id).val(arrTotalPower[indexOfTotalPower]);
    $("#totalEnergy-" + id).val(arrTotalEnergy[indexOfTotalEnergy]);
    GrandTotalPower = 0;
    GrandTotalEnergy = 0;
    for (let index = 0; index < arrTotalPower.length; index++) {
        GrandTotalPower = GrandTotalPower + parseInt(arrTotalPower[index]);
    }
    for (let index = 0; index < arrTotalEnergy.length; index++) {
        GrandTotalEnergy = GrandTotalEnergy + arrTotalEnergy[index];
    }
    $("#GrandTotalPower").val(GrandTotalPower);
    $("#GrandTotalEnergy").val(GrandTotalEnergy);
    $("#totalEnergy-" + id).val(subEnergy);
    $("#dailyUsage-" + id).change(function () {
        GrandTotalEnergy = 0;
        var dailyUsage_1 = $("#dailyUsage-" + id).val();
        var subEnergy_1 = dailyUsage_1 * subPower;
        arrTotalEnergy[indexOfTotalEnergy] = subEnergy_1;
        $("#totalEnergy-" + id).val(arrTotalEnergy[indexOfTotalEnergy]);
        for (let index = 0; index < arrTotalEnergy.length; index++) {
            GrandTotalEnergy = GrandTotalEnergy + arrTotalEnergy[index];
        }
        $("#GrandTotalEnergy").val(GrandTotalEnergy);
    });
}
function totalPower(id) {
    GrandTotalPower = 0;
    GrandTotalEnergy = 0;
    for (let index = 0; index < arrTotalPower.length; index++) {
        GrandTotalPower = GrandTotalPower + arrTotalPower[index];
    }
    for (let index = 0; index < arrTotalEnergy.length; index++) {
        GrandTotalEnergy = GrandTotalEnergy + arrTotalEnergy[index];
    }
    $("#GrandTotalPower").val(GrandTotalPower);
    $("#GrandTotalEnergy").val(GrandTotalEnergy);
}
function formTwo() {

    var div1 = document.getElementById("form_one");
    var div2 = document.getElementById("form_two");
    if (div2.style.display === "none") {
        div2.style.display = "block";
        div1.style.display = "none";
    } else {
        div2.style.display = "none";
        div1.style.display = "block";
    }
}

function selectTemp(i) {

    var number = 0;
    var id = $(".select-template-"+i).val();

    $('.templates').change(function(){
        arrTempAppliance.length = 0;
        arrTempIndex.length = 0;
        arrTempNotNull.length = 0;
        arrTotalEnergy.length = 0;
        arrTotalPower.length = 0;
        
        console.log('asa');
        
        $('input[type=checkbox]').prop('checked',false);
        // $("#appliance-" + i).attr('checked',false).prop('value','off');
        $("#qty-" + i).val();
        $("#dailyUsage-" + i).val();
            
            
    })
    $.ajax({
        url: setTemplate,
        type: "get",
        data: { id: id, _token: "{{csrf_token()}}" },
        success: function (response) {

            for (let index = 0; index < response.length; index++) {

                $("#appliance-" + response[index].appliance_name).prop("checked", true);
                arrTempAppliance.push([response[index].appliance_name, [response[index].appliance_name, response[index].appliance_qty, response[index].appliance_dailyusage]]);

                if (response[index].appliance_qty != null) { 

                    arrTempNotNull.push([response[index].appliance_name, [response[index].appliance_name, response[index].appliance_qty, response[index].appliance_dailyusage]]);
                
                }
            }
            
                for (let indexs = 0; indexs < response.length; indexs++) {
                   
                    $("#appliance-" + arrTempNotNull[indexs].appliance_name).prop("checked", false);
                    $("#qty-" + arrTempNotNull[indexs][0]).val(arrTempNotNull[indexs][1][1]);
                    $("#dailyUsage-" + arrTempNotNull[indexs][0]).val(arrTempNotNull[indexs][1][2]);
                    arrTempIndex[indexs] = arrTempNotNull[indexs][0];
                    appliances(arrTempNotNull[indexs][0], number, from);
                    number++;
                    
                }

          
            $("#qty-" + arrTempNotNull[0][0]).val(arrTempNotNull[0][1][1]);
            $("#dailyUsage-" + arrTempNotNull[0][0]).val(arrTempNotNull[0][1][2]);
        },
    });
    
}

function formThree() {
    var div2 = document.getElementById("form_two");
    var div3 = document.getElementById("form_three");
    if (div3.style.display === "none") {
        div3.style.display = "block";
        div2.style.display = "none";
    } else {
        div3.style.display = "none";
        div2.style.display = "block";
    }
    var unitPower = 0;
    var arrInverter = [];
    var arrBattery = [];
    var batteryDefaultIndex = 0;
    var batteryText = 0;
    var batteryIndex = 0;
    var panelPrice = 0;
    var inverter = 0;
    var inverterVal = 0;
    var inverterUnit = 0;
    var inverterQty = 0;
    var inverterSubPrice = 0;
    var batteryVal = 0;
    var batteryQty = 0;
    var batteryPrice = 0;
    var panelUnit = 0;
    var panelQty = 0;
    var panelSubPrice = 0;
    var installationVal = 0;
    var installationQty = 1;
    var installationCost = 0;
    var standVal = 0;
    var standQty = 0;
    var wireVal = 0;
    var wireCostId = 0;
    var wireCostName = 0;
    var wireCostPrice = 0;
    $.ajax({
        url: allProducts,
        success: function (msg) {

            $("#breaker_id").val(msg[7].product[0].id);
            $("#brkName").val(msg[7].product[0].name);
            $("#brkUnitName").val(msg[7].product[0].unit_name);
            $("#brkUnitPrice").val(msg[7].product[0].unit_price);

            arrPrice[7]=msg[7].product[0].unit_price;

            $("#toggle1").change(function () {
                if ($("#toggle1").prop("checked")) {
                    battery();
                } else {
                    $("#bName").val("");
                    $("#battery_id").val("");
                    $("#bQty").val("");
                    $("#bUnitName").val("");
                    $("#bUnitPrice").val("");

                    arrPrice[0] = 0;
                    price = 0;
                    totalPrice()
                }
            });
            $("#net_toggle").change(function () {
                if ($("#net_toggle").prop("checked")) {
                    netmetering();
                } else {
                    $("#nName").val("");
                    $("#nQty").val("");
                    $("#nId").val("");
                    $("#nUnitPrice").val("");
                    $("#bUnitPrice").val("");

                    arrPrice[1] = 0;
                    price = 0;
                    totalPrice()
                }
            });
            msg[0].product.forEach((v, index, element) => {
                var power = element[index].unit * 1000;
                arrInverter.push(power);
                $(".inverter")
                    .find(".list")
                    .append('<li data-value="' + element[index].id + '" value="' + index + '" class="option option' + index + '">' + element[index].name + " " + element[index].unit + element[index].unit_name + " Rating</li>");
            });
            msg[1].product.forEach((v, index, element) => {
                var Bpower = element[index].unit;
                var Bname = element[index].name;
                var BpowerName = element[index].unit_name;
                var Bprice = element[index].unit_price;
                arrBattery.push({ Bname: Bname, Bpower: Bpower, BpowerName: BpowerName, Bprice: Bprice });
                $(".battery-unit")
                    .find(".list")
                    .append('<li data-value="' + element[index].id + '" value="' + index + '" class="option option' + index + '">' + element[index].unit + "</li>");
            });
            msg[5].product.forEach((v, index, element) => {
                wireCostId = element[index].id;
                wireCostName = element[index].name;
                wireCostPrice = element[index].unit_price;
                $(".floor")
                    .find(".list")
                    .append('<li data-value="' + wireCostPrice + '" value="' + wireCostId + '" class="option option' + index + '">' + wireCostName + "</li>");
            });
            for (let i = 0; i < arrInverter.length; i++) {
                if (GrandTotalPower <= arrInverter[i]) {
                    unitPower = arrInverter[i];
                    if (unitPower === msg[0].product[i].unit * 1000) {
                        $("#iUnit").val(msg[0].product[i].unit);
                        $("#iUnitName").val(msg[0].product[i].unit_name);
                        $("#iQty").val(msg[0].product[i].quantity);

                        $("#iUnitPrice").val(msg[0].product[i].unit_price);

                        arrPrice[2]=(msg[0].product[i].unit_price);

                        inverterUnit = msg[0].product[i].unit;
                        var classIndex = arrInverter.indexOf(unitPower);
                        $(".inverter")
                            .find(".option" + classIndex)
                            .addClass("selected");
                        inverterVal = $(".inverter").find(".selected").data("value");
                        $("#inverter_id").val(inverterVal);
                        $(".inverter").find(".selected").attr("name", "inverter-name");
                        var inv = $(".inverter")
                            .find(".option" + classIndex)
                            .val(classIndex);
                        $(".inverter")
                            .find(".current")
                            .text(msg[0].product[i].name + " " + msg[0].product[i].unit + msg[0].product[i].unit_name);
                        $(".inverter").change(function () {
                            inverter = $(".inverter").find(".selected").text();
                            inverterVal = $(".inverter").find(".selected").data("value");
                            $("#inverter_id").val(inverterVal);
                            var inverterIndex = $(".inverter").find(".option.selected").val();
                            inverterUnit = msg[0].product[inverterIndex].unit;
                            inverterPrice = msg[0].product[inverterIndex].unit_price;
                            inverterQty = msg[0].product[inverterIndex].quantity;
                            inverterSubPrice = inverterPrice * inverterQty;
                            $("#iUnit").val(msg[0].product[inverterIndex].unit);
                            $("#iUnitName").val(msg[0].product[inverterIndex].unit_name);
                            $("#iQty").val(msg[0].product[inverterIndex].quantity);
                            $("#iUnitPrice").val(inverterSubPrice);

                            arrPrice[2] = inverterSubPrice;
                            
                            installationQty = inverterUnit * 1000;
                            installationCost = installationPrice * installationQty;
                            $("#inQty").val(installationQty);
                            $("#inUnitPrice").val(installationCost);

                            arrPrice[3] = installationCost;

                            panelQty = (inverterUnit * 1000) / panelUnit;
                            panelSubPrice = panelPrice * Math.round(panelQty);
                            $("#pQty").val(Math.round(panelQty));
                            $("#pUnitPrice").val(panelSubPrice);

                            arrPrice[4]= panelSubPrice;

                            standQty = Math.round(panelQty) / 2;
                            standQty = Math.round(standQty);
                            sPrice = msg[4].product[0].unit_price;
                            standPrice = standQty * sPrice;
                            $("#stand_id").val(standVal);
                            $("#sUnitPrice").val(standPrice);

                            arrPrice[5] = standPrice

                            $("#sQty").val(standQty);
                            changeBattery();
                            
                        });
                        changeBattery();
                        function changeBattery() {
                            $(".battery-unit").change(function () {
                                batteryText = $(".battery-unit").find(".selected").text();
                                batteryVal = $(".battery-unit").find(".selected").data("value");
                                batteryIndex = arrBattery.findIndex((e) => e.Bpower == batteryText);
                            
                                $("#battery_id").val(msg[1].product[batteryIndex].id);
                                $("#bName").val(msg[1].product[batteryIndex].name);
                                $("#bUnitName").val(msg[1].product[batteryIndex].unit_name);
                                $("#bUnitPrice").val(msg[1].product[batteryIndex].unit_price);

                                arrPrice[0] = msg[1].product[batteryIndex].unit_price;
                                price = 0;
                                totalPrice();
                            });
                            if ($("#toggle1").prop("checked")) {
                                battery();
                            } else {
                                $("#battery_id").val();
                                $("#bName").val();
                                $("#bQty").val();
                                $("#bUnitName").val();
                                $("#bUnitPrice").val();

                                arrPrice[0] = 0;
                                price = 0;
                                totalPrice()
                            }
                        }
                        if ($("#toggle1").prop("checked")) {
                            battery();
                        } else {
                            $("#battery_id").val();
                            $("#bName").val();
                            $("#bQty").val();
                            $("#bUnitName").val();
                            $("#bUnitPrice").val();
                            arrPrice[0] = 0;
                            price = 0;
                            totalPrice()
                        }
                        function battery() {
                            if (parseInt(inverterUnit) < 3) {
                                $("#bQty").val(1);
                                batteryQty = 1;
                            } else if (parseInt(inverterUnit) >= 3 && parseInt(inverterUnit) < 5) {
                                $("#bQty").val(2);
                                batteryQty = 2;
                            } else if (parseInt(inverterUnit) >= 5 && parseInt(inverterUnit) < 15) {
                                $("#bQty").val(4);
                                batteryQty = 4;
                            } else if (parseInt(inverterUnit) >= 15 && parseInt(inverterUnit) <= 20) {
                                $("#bQty").val(4);
                                batteryQty = 4;
                            }
                            batteryDefaultIndex = arrBattery.findIndex((e) => e.Bpower == 180);
                            batteryPrice = msg[1].product[batteryDefaultIndex].unit_price;
                            batterySubPrice = batteryPrice * batteryQty;
                            $("#battery_id").val(msg[1].product[batteryDefaultIndex].id);
                            $("#bName").val(msg[1].product[batteryDefaultIndex].name);
                            $(".battery-unit").find(".current").text(180);
                            $("#bUnitName").val(msg[1].product[batteryDefaultIndex].unit_name);
                            $("#bUnitPrice").val(batterySubPrice);
                            arrPrice[0] = batterySubPrice;
                            price = 0;
                            totalPrice()
                        }
                        panelVal = msg[2].product[0].id;
                        panelUnit = msg[2].product[0].unit;
                        panelQty = (inverterUnit * 1000) / panelUnit;
                        panelPrice = msg[2].product[0].unit_price;
                        console.log('data',msg);
                        panelSubPrice = panelPrice * Math.round(panelQty);
                        $("#panel_id").val(panelVal);
                        $("#pName").val(msg[2].product[0].name);
                        $("#pUnit").val(msg[2].product[0].unit);
                        $("#pQty").val(Math.round(panelQty));
                        $("#pUnitName").val(msg[2].product[0].unit_name);
                        $("#pUnitPrice").val(panelSubPrice);

                        arrPrice[4] = panelSubPrice;

                        installationPrice = msg[3].product[0].unit_price;
                        installationQty = inverterUnit * 1000;
                        installationCost = installationPrice * installationQty;
                        installationVal = msg[3].product[0].id;
                        $("#installation_id").val(installationVal);
                        $("#inName").val(msg[3].product[0].name);
                        $("#inUnit").val(msg[3].product[0].unit_name);
                        $("#inQty").val(installationQty);
                        $("#inUnitPrice").val(installationCost);

                        arrPrice[3] = installationCost;

                        standVal = msg[4].product[0].id;
                        standQty = Math.round(panelQty) / 2;
                        standQty = Math.round(standQty);
                        sPrice = msg[4].product[0].unit_price;
                        standPrice = standQty * sPrice;
                        $("#stand_id").val(standVal);
                        $("#sName").val(msg[4].product[0].name);
                        $("#sUnitPrice").val(standPrice);

                        arrPrice[5] = standPrice;

                        $("#sQty").val(standQty);
                        function netmetering() {
                            $("#nId").val(msg[6].product[0].id);
                            $("#nName").val(msg[6].product[0].name);
                            $("#nUnitPrice").val(msg[6].product[0].unit_price);

                            arrPrice[1] = msg[6].product[0].unit_price;
                            price = 0;
                            totalPrice()

                        }
                        if ($("#net_toggle").prop("checked")) {
                            netmetering();
                        } else {
                            $("#nName").val("");
                            $("#nQty").val("");
                            $("#nId").val("");
                            $("#nUnitPrice").val("");

                            arrPrice[1] = 0;
                            price = 0;
                            totalPrice();
                        }
                    
                        $(".floor").change(function () {
                            wireCostName = $(".floor").find(".selected").text();
                            wireCostId = $(".floor").find(".selected").val();
                            wireCostPrice = $(".floor").find(".selected").data("value");
                          
                            $("#wire_id").val(wireCostId);
                            $("#wUnitPrice").val(wireCostPrice);

                            arrPrice[6] = wireCostPrice;
                            price = 0;
                            totalPrice()
                            
                        });
                    }
                    
                    

                    break;
                }
            }
            inverter = $(".inverter").find(".selected").text();
            totalPrice()
                function totalPrice()
                {
                    price = 0;
                    for (let index = 0; index < arrPrice.length; index++) {
                        price = price + arrPrice[index];
                        console.log(price);
                    }
                    $('#totalPrice').text(price)
                }
        },
    });
}
function prevFormTwo() {
    var div2 = document.getElementById("form_two");
    var div3 = document.getElementById("form_three");
    if (div3.style.display == "block") {
        div3.style.display = "none";
        div2.style.display = "block";
    } else {
        div3.style.display = "block";
        div2.style.display = "none";
    }
}
function prevFormOne() {
    var div1 = document.getElementById("form_one");
    var div2 = document.getElementById("form_two");
    if (div2.style.display == "block") {
        div2.style.display = "none";
        div1.style.display = "block";
    } else {
        div2.style.display = "block";
        div1.style.display = "none";
    }
}
