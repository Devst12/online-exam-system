<footer class="oes-footer mt-5 pt-5 pb-4 border-top">
  <div class="container">
    <div class="row g-4 mb-4">
      <div class="col-lg-5">
        <div class="d-flex align-items-center gap-2 mb-2">
          <i class="bi bi-mortarboard-fill" style="color:var(--oes-primary); font-size:1.4rem"></i>
          <span class="fw-bold fs-5"><?= e(APP_NAME) ?></span>
        </div>
       
        
      </div>

      <div class="col-6 col-lg-3">
        <h6 class="text-uppercase small fw-bold text-muted mb-3">Quick links</h6>
        <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
          <li><a class="text-decoration-none text-body-secondary" href="<?= e(base_url('index.php')) ?>">Home</a></li>
          <li><a class="text-decoration-none text-body-secondary" href="<?= e(base_url('exams.php')) ?>">Exams</a></li>
          <li><a class="text-decoration-none text-body-secondary" href="<?= e(base_url('leaderboard.php')) ?>">Leaderboard</a></li>
          <li><a class="text-decoration-none text-body-secondary" href="<?= e(base_url('feedback.php')) ?>">Feedback</a></li>
        </ul>
      </div>

      
    </div>

    <hr class="my-3 opacity-25">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 small text-muted">
      <div>
        &copy; <?= date('Y') ?> <strong><?= e(APP_NAME) ?></strong> &middot; Crafted by
        <a class="text-decoration-none fw-semibold" href="##" target="_blank" rel="noopener">Man Kumar Ghising</a>.
        All rights reserved.
      </div>
      <div>
        Licensed under <a class="text-decoration-none" href="##" target="_blank" rel="noopener">MIT</a>
        &middot;
        
      </div>
    </div>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script src="<?= e(base_url('assets/js/app.js')) ?>"></script>
</body>
</html>
