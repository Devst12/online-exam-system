<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/functions.php';

if (current_user()) redirect('dashboard.php');

$errors = [];
$old = ['name' => '', 'email' => '', 'college' => '', 'mobile' => '', 'gender' => 'M'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();

    $old['name']    = clean_string($_POST['name'] ?? '', 80);
    $old['email']   = strtolower(clean_string($_POST['email'] ?? '', 120));
    $old['college'] = clean_string($_POST['college'] ?? '', 120);
    $old['mobile']  = clean_string($_POST['mobile'] ?? '', 20);
    $old['gender']  = in_array($_POST['gender'] ?? '', ['M','F','O'], true) ? $_POST['gender'] : 'O';
    $password       = (string) ($_POST['password'] ?? '');
    $confirm        = (string) ($_POST['confirm'] ?? '');

    if (mb_strlen($old['name']) < 2)         $errors[] = 'Name must be at least 2 characters.';
    if (!validate_email($old['email']))      $errors[] = 'Please enter a valid email.';
    if (strlen($password) < 6)               $errors[] = 'Password must be at least 6 characters.';
    if ($password !== $confirm)              $errors[] = 'Passwords do not match.';
    if ($old['mobile'] !== '' && !preg_match('/^[0-9 +()-]{6,20}$/', $old['mobile'])) {
        $errors[] = 'Mobile number looks invalid.';
    }

    if (!$errors) {
        $stmt = db()->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$old['email']]);
        if ($stmt->fetch()) {
            $errors[] = 'An account with that email already exists.';
        } else {
            $hash = password_hash($password, PASSWORD_ALGO);
            $stmt = db()->prepare("INSERT INTO users (name,email,password_hash,gender,college,mobile,role,is_active)
                                   VALUES (?,?,?,?,?,?, 'student', 1)");
            $stmt->execute([$old['name'], $old['email'], $hash, $old['gender'], $old['college'] ?: null, $old['mobile'] ?: null]);
            $newId = (int) db()->lastInsertId();
            login_user($newId);
            flash('success', 'Account created — welcome aboard!');
            redirect('dashboard.php');
        }
    }
}

$pageTitle = 'Create account';
include __DIR__ . '/includes/header.php';
?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-7 auth-panel auth-register">
      <div class="card p-4 p-md-5">
        <span class="eyebrow">Student account</span>
        <h1 class="h3 mb-1">Create your account</h1>
        <p class="text-muted">Enter your details to get started.</p>

        <?php foreach ($errors as $err): ?>
          <div class="alert alert-danger"><i class="bi bi-exclamation-triangle"></i> <?= e($err) ?></div>
        <?php endforeach; ?>

        <form method="post" autocomplete="on">
          <?= csrf_field() ?>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label" for="name">Full name</label>
              <input id="name" type="text" name="name" class="form-control" autocomplete="name" required minlength="2" value="<?= e($old['name']) ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label" for="email">Email address</label>
              <input id="email" type="email" name="email" class="form-control" autocomplete="email" required value="<?= e($old['email']) ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label" for="college">College</label>
              <input id="college" type="text" name="college" class="form-control" autocomplete="organization" value="<?= e($old['college']) ?>" placeholder="Optional">
            </div>
            <div class="col-md-6">
              <label class="form-label" for="mobile">Mobile number</label>
              <input id="mobile" type="tel" name="mobile" class="form-control" autocomplete="tel" value="<?= e($old['mobile']) ?>" placeholder="Optional">
            </div>
            <div class="col-md-4">
              <label class="form-label" for="gender">Gender</label>
              <select id="gender" name="gender" class="form-select">
                <option value="M" <?= $old['gender']==='M'?'selected':'' ?>>Male</option>
                <option value="F" <?= $old['gender']==='F'?'selected':'' ?>>Female</option>
                <option value="O" <?= $old['gender']==='O'?'selected':'' ?>>Other</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label" for="password">Password</label>
              <input id="password" type="password" name="password" class="form-control" autocomplete="new-password" required minlength="6">
            </div>
            <div class="col-md-4">
              <label class="form-label" for="confirm">Confirm password</label>
              <input id="confirm" type="password" name="confirm" class="form-control" autocomplete="new-password" required minlength="6">
            </div>
          </div>
          <button class="btn btn-primary w-100 btn-lg mt-4" type="submit">
            <i class="bi bi-person-plus"></i> Create account
          </button>
          <div class="text-center mt-3 small text-muted">
            Already have an account? <a href="<?= e(base_url('login.php')) ?>">Sign in</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__ . '/includes/footer.php'; ?>
