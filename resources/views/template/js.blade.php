<script src="{{ asset('assets/dashboard-admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/dashboard-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/dashboard-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/dashboard-admin/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('assets/dashboard-admin/vendor/chart.js/Chart.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Page level plugins -->
<script src="{{ asset('assets/dashboard-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dashboard-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/dashboard-admin/js/demo/datatables-demo.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable();
        });
    </script>

<script>
      $('.hapuslhp').click(function(){
            var data_id = $(this).attr('data-id');
            var kategori = $(this).attr('data-kategori');
            swal({
            title: "Apa kamu yakin?",
            text: "kamu akan menghapus LHPS dengan kategori "+kategori+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                  window.location = "/lhp/destroy/"+data_id+""
                  swal("LHPS "+kategori+" berhasil di hapus", {
                  icon: "success",
                  });
            } else {
                  // swal("property "+kategori+" gagal di hapus");
                  swal(
                        'Oooops!!!',
                        'LHPS '+kategori+' gagal di hapus :)',
                        'error'
                  )
            }
            });
      });
</script>

<script>
      $('.hapusakun').click(function(){
            var data_id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            swal({
            title: "Apa kamu yakin?",
            text: "kamu akan menghapus Akun dengan name "+name+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                  window.location = "/akun/destroy/"+data_id+""
                  swal("Akun "+name+" berhasil di hapus", {
                  icon: "success",
                  });
            } else {
                  // swal("property "+name+" gagal di hapus");
                  swal(
                        'Oooops!!!',
                        'Akun '+name+' gagal di hapus :)',
                        'error'
                  )
            }
            });
      });
</script>

<script>
      $('.hapusberkas').click(function(){
            var data_id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
            swal({
            title: "Apa kamu yakin?",
            text: "kamu akan menghapus Berkas dengan name guru "+nama+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                  window.location = "/upload/destroy/"+data_id+""
                  swal("Berkas Guru dengan nama "+nama+" berhasil di hapus", {
                  icon: "success",
                  });
            } else {
                  // swal("property "+name+" gagal di hapus");
                  swal(
                        'Oooops!!!',
                        'Berkas guru '+nama+' gagal di hapus :)',
                        'error'
                  )
            }
            });
      });
</script>