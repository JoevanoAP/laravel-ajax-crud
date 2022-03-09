<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Crud Ajax</title>
  </head>
  <body>
    <section class="container">
        <div class="row mt-3">
            <div class="col-lg-8">
                <h3>Add Students Data</h3>
                <button class="btn btn-primary" onclick="create()">Add Data</button>
                
                {{-- Modal --}}
                <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="form"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Modal --}}

            </div>
        </div>
    </section>

    {{-- Option 1: Bootstrap Bundle with Popper --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    {{-- Script --}}
    <script>
        function create(){
            // Get create (return view create)
            $.get("{{ url('create') }}", {}, (data,status) => {
                // get html data from view create and inject into id form
                $("#form").html(data);
                // Show Modal that already have form from view create
                $("#formModal").modal('show');
            });
        }

        function store(){
            var nis = $("#nis").val();
            var name = $("#name").val();
            var kelas = $("#kelas").val();
            var email = $("#email").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "get",
                url: "{{ url('store') }}",
                data: {
                    "nis": nis,
                    "name": name,
                    "kelas": kelas,
                    "email": email,
                },
                success: (data) => {
                    $(".btn-close").click();
                },
            });
        }
    </script>
  </body>
</html>
