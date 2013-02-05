/**
 * Copyright 2013 NEPO Systems, LLC
 *
 * User: @bickart
 * Date: 1/15/13
 * Time: 4:42 PM
 *
 */
var label;
var printers;

// loads all supported printers into a combo box
function loadPrinters() {

    if (printers == null)
        printers = dymo.label.framework.getLabelWriterPrinters();

    if (printers.length == 0) {
        YAHOO.SUGAR.MessageBox.show({msg:"No DYMO printers are installed. Install DYMO printers.", type:"alert", close:false});
        return;
    }

    var printersSelect = document.getElementById('printersSelect');
    for (var i = 0; i < printers.length; i++) {
        var printer = printers[i];

        var printerName = printer.name;

        var option = document.createElement('option');
        option.value = printerName;
        option.appendChild(document.createTextNode(printerName));
        printersSelect.appendChild(option);
    }
}

function loadLabelFromWeb() {
    // use jQuery API to load label
    $.get("index.php?entryPoint=download&type=Documents&id=" + $('#label_id').attr('value'), function (labelXml) {
        label = dymo.label.framework.openLabelXml(labelXml);
        label.setObjectText("Address", document.getElementById('name').value);
        try {
            label.print($('#printersSelect').attr('value'));
        }
        catch (e) {
            alert(e);
        }
    }, "text");
}

function printLabel(record) {
    $.getJSON("index.php?module=Contacts&action=dymo&record=" + record,
        {
            format:"json"
        },
        function (data) {
            YAHOO.SUGAR.MessageBox.show({msg:data[0].form, type:'alert', close:false, width:640,
                buttons:[
                    {text:"Print", isDefault:true, handler:function () {
                        $.ajax({
                            url:"index.php",
                            async:false,
                            dataType:"json",
                            type:"GET",
                            data:$('#PrintLabel').serialize()
                        })
                            .done(function (data) {
                                if (data.status == "fail") {
                                    YAHOO.SUGAR.MessageBox.show({msg:data.msg, type:'alert'});
                                    return;
                                }
                                loadLabelFromWeb();
                                YAHOO.SUGAR.MessageBox.hide();
                            })
                            .always(function () {
                                //showSubPanel('labels', null, true);
                                showSubPanel('camp_campus_initiatives_contacts', null, true);
                            });
                    }
                    },
                    {text:"Cancel", handler:function () {
                        YAHOO.SUGAR.MessageBox.hide();
                    }
                    }
                ]
            });
            loadPrinters();
        });
}