@include('layouts.header')

<!-- Add Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل المقعد</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateForm" method="POST">
                @csrf
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" class="id form-control">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="chair">رمز المقعد</label>
                            <select id="chair" name="chair" class="chair form-control"></select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <button type="button"
                                onclick="window.open('/assets/img/chair.jpeg','mozillaWindow', 'popup');"
                                class="btn btn-primary">مخطط الكراسي</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="add btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="container" style="background-color: #fff">
    <main class="flex-shrink-1">
        <div class="container">
            <table id="example" class="table table-striped table-bordered" style="text-align: right;">
                <thead>
                    <tr>
                        <th style="text-align: right;">الاسم</th>
                        <th style="text-align: right;">رقم الجوال</th>
                        <th style="text-align: right;">البريد الالكتروني</th>
                        <th style="text-align: right;">نوع الدعوة</th>
                        <th style="text-align: right;">رمز المقعد</th>
                        <th style="text-align: right;">الفئة</th>
                        <th style="text-align: right;">هل حضر الحفل</th>
                        <th style="text-align: right;">x</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </main>
</div>


@include('layouts.footer')

<script>
    function fetch_all() {
        var x, created_at;
        $.ajax({
            type: 'GET',
            url: `/fetch-all`,
            dataType: 'json',
            success: function(response) {
                $('tbody').html("");
                $.each(response.invitations, function(key, item) {
                    if (typeof item.chair_id === 'undefined' || item.chair_id === null) {
                        chair = "";
                    } else {
                        chair = item.chair.code;
                    }
                    if (item.invitation_status == "1")
                        invitation_status = "داخلي";
                    if (item.invitation_status == "2")
                        invitation_status = "خارجي";

                    if (item.is_attended == "1")
                        is_attended =
                        '<input  type="checkbox"  checked></div>';
                    else
                        is_attended =
                        '<input type="checkbox"></div>';


                    $('tbody').append(
                        '<tr>\
                                                                            <td>' +
                        item.name +
                        '</td>\
                                                                            <td>' +
                        item
                        .mobile +
                        '</td>\
                                                                     <td>' +
                        item.email1 +
                        '</td>\
                        <td>' +
                        invitation_status +
                        '</td>\
                        <td>' +
                        chair +
                        '</td>\
                        <td>' +
                        item.category.name +
                        '</td>\
                        <td>' +
                        is_attended +
                        '</td>\
                            <td><button type="button" value="' + item.id + '" class="edit" id="edit" style="background-color:transparent;border:none;color:black" ><i class="material-icons"  style="font-size:15px">person</i></button>\
                                <i class="material-icons"  style="font-size:15px">edit</i>\
                                <i class="material-icons" style="font-size:15px">search</i>\
                                <i class="material-icons" style="font-size:15px">close</i>\
                                <i class="material-icons" style="font-size:15px">devices</i></td>\
                     </tr>'
                    );
                });

                $('#chair')
                    .empty()
                    .append('<option selected="selected" value="...">الرجاء الاختيار</option>');
                $.each(response.chairs, function(key, item) {
                    $('#chair')
                        .append($("<option name='chair' id='chair'></option>")
                            .attr("id", item.id)
                            .text(item.code));

                });
                $("#example").dataTable({
                    language: {
                        url: "/assets/lang/ar.json",
                    },
                    lengthMenu: [5, 8],
                });
            }
        });
    }



    $(document).ready(function() {
        function resetFields() {
            $('#EditModal form')[0].reset();
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        fetch_all();

        $("#EditModal").on("hidden.bs.modal", function() {
            resetFields();
        });

        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            var id = $(this).val();
            $('#EditModal').modal('show');
            $("#id").val(id);

        });

        $('.add').click(function(e) {
            e.preventDefault();
            var id = $('#id').val();
            var chair = $('#chair').val();
            var data = {
                'name': $('.name').val(),
                'email1': $('.email1').val(),
                'chair_id': chair,
            }
            $.ajax({
                type: 'POST',
                url: `/update-chair` + '/' + id,
                data: data,
                dataType: 'json',
                success: function(response) {
                    $('#EditModal').modal('hide');

                    $.ajax({
                        type: 'POST',
                        url:  `/chair-condition` + '/' + chair,
                        dataType: 'json',
                        success: function(response) {
                        }
                    })

                    fetch_all();
                },
                error: function(response) {}
            })
        });
    });
</script>
