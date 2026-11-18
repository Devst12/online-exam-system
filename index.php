<?php
require_once __DIR__ . '/includes/auth.php';

$current = current_user();
if ($current) {
    redirect($current['role'] === 'admin' ? 'admin/dashboard.php' : 'dashboard.php');
}

$pageTitle = 'Home';
include __DIR__ . '/includes/header.php';
?>

<section class="container">
  <div class="hero">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <span class="exam-tag mb-3"><i class="bi bi-mortarboard"></i> Online examination portal</span>
        <h1 class="mt-2">Prepare, take, and review exams in one place.</h1>
        <p class="lead text-muted mt-3">Find an available exam, complete it within the time limit, then review your score and past attempts from your dashboard.</p>
        <div class="d-flex flex-wrap gap-2 mt-4">
          <a class="btn btn-primary btn-lg" href="<?= e(base_url('register.php')) ?>"><i class="bi bi-person-plus"></i> Create an account</a>
          <a class="btn btn-outline-primary btn-lg" href="<?= e(base_url('login.php')) ?>"><i class="bi bi-box-arrow-in-right"></i> Student sign in</a>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="card p-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="exam-tag">Exam process</span>
            <i class="bi bi-journal-check fs-4 text-muted" aria-hidden="true"></i>
          </div>
          <div class="d-flex gap-3 align-items-start mb-3">
            <span class="feature-icon flex-shrink-0">1</span>
            <div><h6 class="mb-1">Choose an exam</h6><p class="small text-muted mb-0">Browse the subjects and check the time allowed.</p></div>
          </div>
          <div class="d-flex gap-3 align-items-start mb-3">
            <span class="feature-icon flex-shrink-0">2</span>
            <div><h6 class="mb-1">Answer at your pace</h6><p class="small text-muted mb-0">Move between questions while the exam timer is running.</p></div>
          </div>
          <div class="d-flex gap-3 align-items-start">
            <span class="feature-icon flex-shrink-0">3</span>
            <div><h6 class="mb-1">Review your result</h6><p class="small text-muted mb-0">See your score and revisit previous attempts.</p></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container py-5" id="features">
  <div class="text-center mb-4">
    <span class="exam-tag">For students and staff</span>
    <h2 class="mt-2 fw-bold">The tools for running an exam from start to finish.</h2>
  </div>
  <div class="row g-3">
    <?php
    $features = [
      ['bi-stopwatch', 'Timed exams', 'Each exam has its own time limit, with a clear countdown while you work.'],
      ['bi-list-check', 'Question navigation', 'Move between questions and review your answers before submitting.'],
      ['bi-clipboard-data', 'Results and history', 'Review marks and answers, and keep a record of your attempts.'],
      ['bi-person-badge', 'Student accounts', 'Keep your profile and exam activity together in one place.'],
      ['bi-pencil-square', 'Exam management', 'Staff can publish quizzes and manage questions from the admin area.'],
      ['bi-graph-up-arrow', 'Useful summaries', 'Track participation and performance with exam reports.'],
      ['bi-chat-dots', 'Feedback', 'Send feedback or report an issue from within the portal.'],
      ['bi-phone', 'Responsive pages', 'Use the portal on a phone, tablet, laptop, or desktop.'],
    ];
    foreach ($features as [$icon, $title, $desc]):
    ?>
      <div class="col-sm-6 col-lg-3">
        <div class="card h-100 p-4">
          <div class="feature-icon mb-3"><i class="bi <?= e($icon) ?>"></i></div>
          <h5 class="mb-2"><?= e($title) ?></h5>
          <p class="text-muted small mb-0"><?= e($desc) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="container py-4" id="how">
  <div class="row g-4 align-items-center">
    <div class="col-lg-5">
      <span class="exam-tag">How it works</span>
      <h2 class="fw-bold mt-2">A straightforward exam workflow.</h2>
      <p class="text-muted">Students take and review exams. Administrators prepare quizzes and keep track of participation.</p>
    </div>
    <div class="col-lg-7">
      <ol class="list-group list-group-numbered list-group-flush">
        <li class="list-group-item bg-transparent border-0 py-3"><strong>Sign in.</strong> Create a student account or use your existing credentials.</li>
        <li class="list-group-item bg-transparent border-0 py-3"><strong>Choose an exam.</strong> Browse what is available and check its instructions and time limit.</li>
        <li class="list-group-item bg-transparent border-0 py-3"><strong>Complete and review.</strong> Submit your answers to see your result and keep a record of your attempts.</li>
      </ol>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
