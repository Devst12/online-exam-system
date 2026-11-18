<footer class="oes-footer">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
      <a class="navbar-brand fw-semibold text-decoration-none" href="<?= e(base_url('index.php')) ?>">
        <span class="brand-mark" aria-hidden="true">OE</span>
        <span class="brand-name"><?= e(APP_NAME) ?><small>EXAM PORTAL</small></span>
      </a>
      <nav class="d-flex flex-wrap gap-3 small" aria-label="Footer navigation">
        <a class="text-decoration-none text-body-secondary" href="<?= e(base_url('exams.php')) ?>">Exams</a>
        <a class="text-decoration-none text-body-secondary" href="<?= e(base_url('leaderboard.php')) ?>">Leaderboard</a>
        <a class="text-decoration-none text-body-secondary" href="<?= e(base_url('feedback.php')) ?>">Feedback</a>
      </nav>
      <span class="small text-muted">&copy; <?= date('Y') ?> <?= e(APP_NAME) ?></span>
    </div>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script src="<?= e(base_url('assets/js/app.js')) ?>"></script>
</body>
</html>
