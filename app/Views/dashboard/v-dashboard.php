<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<!-- Page header -->
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          Overview
        </div>
        <h2 class="page-title">
          Dashboard
        </h2>
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-post">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M12 5l0 14"></path>
              <path d="M5 12l14 0"></path>
            </svg>
            POST
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page body -->
<div class="page-body">
  <div class="container-xl">
    <div class="row row-cards">
      <div class="col-12">
        <div class="card">
          <div class="table-responsive">
            <table class="table table-vcenter card-table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($posts as $post) : ?>
                  <tr>
                    <td><span class="text-muted"><?= $no++ ?></span></td>
                    <td><a href="" class="text-reset" tabindex="-1"><?= $post['title'] ?></a></td>
                    <td>
                      <?= $post['content'] ?>
                    </td>
                    <td><?= $post['date'] ?></td>
                    <td>
                      <a href="#" class="text-green" data-bs-toggle="modal" data-bs-target="#modal-update-price-obat">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-currency-dollar" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2"></path>
                          <path d="M12 3v3m0 12v3"></path>
                        </svg>
                      </a>
                      <a href="#" data-bs-toggle="modal" data-bs-target="#modal-edit-obat"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                          <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                          <path d="M16 5l3 3"></path>
                        </svg></a>
                      <a href="#" class="text-red" data-bs-toggle="modal" data-bs-target="#modal-delete-obat"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M4 7l16 0"></path>
                          <path d="M10 11l0 6"></path>
                          <path d="M14 11l0 6"></path>
                          <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                          <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                        </svg></a>

                    </td>
                    <div class="modal modal-blur fade" id="modal-delete-obat" tabindex="-1" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          <div class="modal-status bg-danger"></div>
                          <div class="modal-body text-center py-4">
                            <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z"></path>
                              <path d="M12 9v4"></path>
                              <path d="M12 17h.01"></path>
                            </svg>
                            <h3>Are you sure?</h3>
                            <div class="text-muted">Do you really want to remove 84 files? What you've done cannot be undone.</div>
                          </div>
                          <div class="modal-footer">
                            <div class="w-100">
                              <div class="row">
                                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                    Cancel
                                  </a></div>
                                <div class="col"><a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                    Delete 84 items
                                  </a></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal modal-blur fade" id="modal-update-price-obat" tabindex="-1" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Form update harga obat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label">Name</label>
                              <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
                            </div>
                            <div class="row">
                              <div class="col-lg-8">
                                <div class="mb-3">
                                  <label class="form-label">Report url</label>
                                  <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                      https://tabler.io/reports/
                                    </span>
                                    <input type="text" class="form-control ps-0" value="report-01" autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="mb-3">
                                  <label class="form-label">Visibility</label>
                                  <select class="form-select">
                                    <option value="1" selected="">Private</option>
                                    <option value="2">Public</option>
                                    <option value="3">Hidden</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label class="form-label">Client name</label>
                                  <input type="text" class="form-control">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label class="form-label">Reporting period</label>
                                  <input type="date" class="form-control">
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div>
                                  <label class="form-label">Additional information</label>
                                  <textarea class="form-control" rows="3"></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                              Cancel
                            </a>
                            <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                              </svg>
                              Create new report
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal modal-blur fade" id="modal-edit-obat" tabindex="-1" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Form edit data obat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label">Name</label>
                              <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
                            </div>
                            <div class="row">
                              <div class="col-lg-8">
                                <div class="mb-3">
                                  <label class="form-label">Report url</label>
                                  <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                      https://tabler.io/reports/
                                    </span>
                                    <input type="text" class="form-control ps-0" value="report-01" autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="mb-3">
                                  <label class="form-label">Visibility</label>
                                  <select class="form-select">
                                    <option value="1" selected="">Private</option>
                                    <option value="2">Public</option>
                                    <option value="3">Hidden</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label class="form-label">Client name</label>
                                  <input type="text" class="form-control">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="mb-3">
                                  <label class="form-label">Reporting period</label>
                                  <input type="date" class="form-control">
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div>
                                  <label class="form-label">Additional information</label>
                                  <textarea class="form-control" rows="3"></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                              Cancel
                            </a>
                            <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                              </svg>
                              Create new report
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="modal-post" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Tambah Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form-post">
        <input type="hidden" class="txt_csrf_post" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <input type="hidden" name="username" value="<?= session()->get('username') ?>">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
                <div class="invalid-feedback error_title"></div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date">
                <div class="invalid-feedback error_date"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <div>
                <label class="form-label">Keterangan tambahan</label>
                <textarea class="form-control" rows="3" id="description" name="description"></textarea>
                <div class="invalid-feedback error_description"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
          </a>
          <button type="submit" class="btn btn-primary btn-save ms-auto">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M12 5l0 14"></path>
              <path d="M5 12l14 0"></path>
            </svg>
            Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 1500,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
      },
    });
    $(document).on('submit', '#form-post', function(e) {
      e.preventDefault()
      $.ajax({
        url: '<?= site_url() ?>dashboard/post/store',
        method: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function() {
          $('.btn-save').prop('disabled', true);
          $('.btn-save').html('Loading');
        },
        complete: function() {
          $('.btn-save').prop('disabled', false);
          $('.btn-save').html('Save');
        },
        success: function(response) {
          console.log(response);
          if (response.error) {
            $('.txt_csrf_drug').val(response.token);
            let data = response.error
            let fields = ["title", "date", "description"];
            fields.forEach((field) => {
              if (data['error_' + field]) {
                $('#' + field).addClass('is-invalid');
                $('.error_' + field).html(data['error_' + field])
              } else {
                $('#' + field).removeClass('is-invalid');
                $('#' + field).addClass('is-valid is-valid-lite');
              }
            })
          } else {
            $('#form-drug').trigger('reset');
            $('.txt_csrf_drug').val(response.token);
            $('.is-invalid').removeClass('is-invalid')
            $('.is-valid').removeClass('is-valid is-valid-lite')
            Toast.fire({
              icon: response.status,
              title: response.message,
            });
          }
        }
      })
    })
  })
</script>
<?= $this->endSection() ?>