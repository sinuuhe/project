$(document).ready(function () {
    $('.sidenav').sidenav();
    $('.materialboxed').materialbox();
    $(".dropdown-trigger").dropdown({
        coverTrigger: false,
        hover: true,
        closeOnClick: true
    });
    $('select').formSelect();
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        i18n: {
            months:
                [
                    'Enero',
                    'Febrero',
                    'Marzo',
                    'Abril',
                    'Mayo',
                    'Junio',
                    'Julio',
                    'Agosto',
                    'Septiembre',
                    'Octubre',
                    'Noviembre',
                    'Diciembre'
                ],
            monthsShort:
                [
                    'Ene',
                    'Feb',
                    'Mar',
                    'Abr',
                    'May',
                    'Jun',
                    'Jul',
                    'Ago',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dic'
                ],
            weekdays:
                [
                    'Domingo',
                    'Lunes',
                    'Martes',
                    'Miércoles',
                    'Jueves',
                    'Viernes',
                    'Sábado'
                ],
            weekdaysShort:
                [
                    'Dom',
                    'Lun',
                    'Mar',
                    'Mie',
                    'Jue',
                    'Vie',
                    'Sab'
                ], 
            cancel: 'Cancelar',
            clear: 'Borrar',
            done: 'Ok',
            previousMonth: '‹',
            nextMonth: '›',

        },
        yearRange:[1950,2018]


    });

});

