$(document).ready(function () {

    if(!($('body').hasClass('cereri.show') || $('body').hasClass('cereri.edit'))) {
        let triggers = document.getElementsByClassName('trigger-card');
        let content = document.getElementsByClassName('cerere-content');

        for (let i = 0; i < triggers.length; i++) {
            triggers[i].addEventListener('click', function () {
                if (content[i].style.display == 'none') {
                    content[i].style.display = 'block';
                } else {
                    content[i].style.display = 'none';
                }
            })
        }

        const listViewButton = document.querySelector('.list-view-button');
        const gridViewButton = document.querySelector('.grid-view-button');
        const list = document.querySelector('ol');

        listViewButton.onclick = function () {
            list.classList.remove('grid-view-filter');
            list.classList.add('list-view-filter');
        }

        gridViewButton.onclick = function () {
            list.classList.remove('list-view-filter');
            list.classList.add('grid-view-filter');
        }
    } else if($('body').hasClass('cereri.show') || $('body').hasClass('cereri.edit')) {

        function populate(frm, data) {
            $.each(data, function (key, value) {
                var ctrl = $('[name=' + key + ']', frm);
                switch (ctrl.prop("type")) {
                    case "radio":
                    case "checkbox":
                        ctrl.each(function () {
                            if ($(this).attr('value') == value) $(this).attr("checked", value);
                        });
                        break;
                    default:
                        ctrl.val(value);
                }
            });
        }

    let data_raw = document.getElementsByClassName('serializedForm')[0];
    let data = null;
    if(typeof(data_raw) != 'undefined' && data_raw != null) {
        data = JSON.parse(data_raw.innerText);
    }
    var form = document.getElementsByClassName('form-adoptie')[0];
    if(typeof(data) != 'undefined' && data != null && typeof(form) != 'undefined' && form != null) {
            populate(form, data);
            document.getElementsByClassName('serializedForm')[0].remove();
        }
    }
});
