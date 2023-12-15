@include('layouts.header')

<div class="container" style="background-color: #fff">
    <main class="flex-shrink-1">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12" style="float: right;background-color:blue;color:white;text-align:center">
                    <label>البيانات</label>
                </div>
            </div>
            <form id="editForm">
                @csrf
                <input  type="hidden"  id="id" name="id"  class="id form-control" value={{ $invitation->id }}>
                <div class="row  mb-4">
                    <div class="col-md-6">
                        <label for="name">الاسم الكامل</label>
                        <input type="text" id="name" name="name" class="name form-control"
                            value={{ $invitation->name }}>
                    </div>
                    <div class="col-md-6">
                        <label for="email1">البريد الالكتروني</label>
                        <input type="text" id="email1" name="email1" class="email1 form-control"
                            value={{ $invitation->email1 }}>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="organization">الجهة</label>
                        <input type="text" id="organization" name="organization" class="organization form-control"
                            value={{ $invitation->organization }}>
                    </div>
                    <div class="col-md-6">
                        <label for="mobile">رقم الواتساب</label>
                        <input type="text" id="mobile" name="mobile" class="mobile form-control"
                            value={{ $invitation->mobile }}>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="job">المنصب</label>
                        <input type="text" id="job" name="job" class="job form-control"
                            value={{ $invitation->job }}>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <button type="submit" class="edit btn btn-primary">التأكيد</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>

@include('layouts.footer')

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('.edit').click(function(e) {
            e.preventDefault();

            var id = $('#id').val();
            var data = {
                'name': $('.name').val(),
                'email1': $('.email1').val(),
                'organization': $('.organization').val(),
                'mobile': $('.mobile').val(),
                'invitation_status': 2,
                'invitation_type_mobile': 2,
                'invitation_type_email': 1,
                'order_status': 2,
                'job': $('.job').val(),
                'is_attended': 1,
                'nick_id': $("#nike2 option:selected").attr("id"),
                'category_id': $("#category option:selected").attr("id"),
                'chair_id': 1,
            }

            $.ajax({
                type: 'POST',
                url: `/update` + '/' + id,
                data: data,
                dataType: 'json',
                success: function(response) {
                    window.location.href = `/invitation`;
                },
                error: function(response) {
                }
            })
        });
    });
</script>

