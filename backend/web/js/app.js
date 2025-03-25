$(function () {
    // 替换yii2默认的js对话框
    yii.confirm = function (message, ok, cancel) {
        // swal({
        //     title: message,
        //     text: null,
        //     type: "warning",
        //     showCancelButton: true,
        //     confirmButtonColor: "#DD6B55",
        //     confirmButtonText: "确定",
        //     cancelButtonText: "取消",
        //     closeOnConfirm: true
        // }, function(isConfirm) {
        //     if (isConfirm) {
        //         !ok || ok();
        //     } else {
        //         !cancel || cancel();
        //     }
        // });
        layer.confirm(message, {
            title: '删除确认',
            icon: 3,
            btn: ['确定', '取消'] //按钮
        }, function (index) {
            layer.close(index);
            ok();
        }, function (index) {
            layer.close(index);
            cancel();
        });
        // confirm will always return false on the first call
        // to cancel click handler
        return false;
    };

    //隐藏没有href的链接
    // $('a:not([href])').hide();

    //Initialize Select2 Elements
    $(".select2").select2({
        'allowClear': true,
        'minimumResultsForSearch': 10,
        'theme': 'default'
    });

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", { "placeholder": "dd/mm/yyyy" });
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", { "placeholder": "mm/dd/yyyy" });
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' });
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
    },
        function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    });

    $('.input-daterange').datepicker({
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
        format: 'yyyy-mm-dd',
        language: 'zh-CN'
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });

    // //Colorpicker
    // $(".my-colorpicker1").colorpicker();
    // //color picker with addon
    // $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
        showInputs: false
    });

    $('a.ajax-create, a.ajax-update').click(function (e) {
        var title = $(this).attr('title');
        $.get($(this).attr('href'), function (content) {
            layer.open({
                type: 1,
                title: title ? title : '编辑',
                shadeClose: true,
                shade: 0.8,
                area: ['60%', '50%'],
                content: content,
                btn: ['保存', '取消'],
                yes: function (index, layero) {
                    var form = layero[0].getElementsByTagName('form')[0];
                    var data = new FormData(form);
                    console.log(data.toString());
                    $.ajax({
                        url: form.getAttribute('action'),
                        type: 'POST',
                        data: data,
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            console.log(data);
                            if (data.success) {
                                layer.close(index);
                                layer.msg(data.message);
                                window.location.reload();
                            } else {
                                layer.alert(data.message);
                            }
                        },
                        error: function (data) {
                            console.log(data);
                            layer.alert(data.message);
                        }
                    });
                }
            });
        });
        return false;
    });


    $('a.ajax-view').click(function (e) {
        var title = $(this).attr('title');
        $.get($(this).attr('href'), function (content) {
            layer.open({
                type: 1,
                title: title ? title : '查看',
                shadeClose: true,
                shade: 0.8,
                area: ['50%', '50%'],
                content: content,
                // btn: ['关闭'],
                // yes: function (index, layero) {
                //     layer.close(index);
                // }
            });
        });
        return false;
    });
});