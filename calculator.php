<?php
session_start();

$show_premium = false;
$purchase_message = '';
$error_message = '';

// Session start
if (!isset($_SESSION['current'])) {
    $_SESSION['current'] = '0';
    $_SESSION['first'] = null;
    $_SESSION['operator'] = null;
    $_SESSION['waiting'] = false;
}

// Calculator button
elseif (isset($_POST['key'])) {

    $key = $_POST['key'];

    // AC
    if ($key == 'AC') {
        $_SESSION['current'] = '0';
        $_SESSION['first'] = null;
        $_SESSION['operator'] = null;
        $_SESSION['waiting'] = false;
    }

    // Number
    elseif (is_numeric($key)) {

        if ($_SESSION['waiting']) {
            $_SESSION['current'] = $key;
            $_SESSION['waiting'] = false;
        } else {
            if ($_SESSION['current'] == '0') {
                $_SESSION['current'] = $key;
            } else {
                $_SESSION['current'] .= $key;
            }
        }
    }

    // Decimal
    elseif ($key == '.') {

        if ($_SESSION['waiting']) {
            $_SESSION['current'] = '0';
            $_SESSION['waiting'] = false;
        }

        if (strpos($_SESSION['current'], '.') === false) {
            $_SESSION['current'] .= '.';
        }
    }

    // +/-
    elseif ($key == '+/-') {
        $_SESSION['current'] =
            (string)(-1 * (float)$_SESSION['current']);
    }

    // %
    elseif ($key == '%') {
        $_SESSION['current'] =
            (string)((float)$_SESSION['current'] / 100);
    }

    // Operator
    elseif (in_array($key, ['+', '-', '*', '/'])) {

        if ($_SESSION['first'] !== null && !$_SESSION['waiting']) {

            $a = (float)$_SESSION['first'];
            $b = (float)$_SESSION['current'];
            $result = 0;

            switch ($_SESSION['operator']) {

                case '+':
                    $result = $a + $b;
                    break;

                case '-':
                    $result = $a - $b;
                    break;

                case '*':
                    $result = $a * $b;
                    break;

                case '/':
                    if ($b == 0) {
                        $result = 'Error';
                    } else {
                        $result = $a / $b;
                    }
                    break;
            }

            $_SESSION['current'] = (string)$result;
        }

        $_SESSION['first'] = $_SESSION['current'];
        $_SESSION['operator'] = $key;
        $_SESSION['waiting'] = true;
    }

    // Equal
    elseif ($key == '=') {

        if (
            $_SESSION['first'] !== null &&
            $_SESSION['operator'] !== null
        ) {

            $a = (float)$_SESSION['first'];
            $b = (float)$_SESSION['current'];
            $result = 0;

            switch ($_SESSION['operator']) {

                case '+':
                    $result = $a + $b;
                    break;

                case '-':
                    $result = $a - $b;
                    break;

                case '*':
                    $result = $a * $b;
                    break;

                case '/':
                    if ($b == 0) {
                        $result = 'Error';
                    } else {
                        $result = $a / $b;
                    }
                    break;
            }

            $_SESSION['current'] = (string)$result;
            $_SESSION['first'] = null;
            $_SESSION['operator'] = null;
            $_SESSION['waiting'] = true;

            // after click equal to show premium
            $show_premium = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background: #e9edf3;
        }

        .calculator {
            width: 350px;
            background: #202b3c;
            padding: 25px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .display {
            height: 100px;
            background: #eef2f7;
            border: none;
            border-radius: 15px;
            text-align: right;
            font-size: 35px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .calc-btn {
            height: 65px;
            font-size: 22px;
            font-weight: 600;
            border-radius: 15px;
            border: none;
        }

        .number {
            background: #34445a;
            color: white;
        }

        .operator {
            background: #ff9f43;
            color: white;
        }

        .clear {
            background: #e74c3c;
            color: white;
        }

        .equal {
            background: #2ecc71;
            color: white;
        }

        .number:hover {
            background: #50627a;
            color: white;
        }

        .operator:hover {
            background: #e88b2e;
            color: white;
        }

        .package-option {
            background: #34445a;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 12px;
            text-align: left;
        }

        .package-option:hover {
            background: #50627a;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar bg-primary px-4">
        <a href="index.php" class="navbar-brand text-white">
            Calculator
        </a>

        <a href="index.php" class="btn btn-light">Home</a>
    </nav>

    <div class="d-flex justify-content-center align-items-center flex-column"
        style="min-height: calc(100vh - 56px);">

        <!-- Purchase Message -->
        <?php if ($purchase_message != ''): ?>
            <div class="alert alert-success text-center mb-4">
                <h5>Purchase Successful!</h5>

                <p class="mb-1">
                    <?php echo htmlspecialchars($purchase_message); ?>
                </p>

                <small>
                    This is a demo selection. No actual payment was made.
                </small>
            </div>
        <?php endif; ?>

        <?php if ($error_message != ''): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <!-- Calculator -->
        <div class="calculator">

            <h3 class="text-white text-center mb-4">
                Calculator
            </h3>

            <form action="" method="POST">

                <input type="text" class="form-control display"
                    value="<?php echo htmlspecialchars($_SESSION['current']); ?>"
                    readonly>

                <div class="row g-2">

                    <div class="col-3">
                        <button type="submit" name="key" value="AC"
                            class="btn clear calc-btn w-100">AC</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="+/-"
                            class="btn number calc-btn w-100">+/-</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="%"
                            class="btn number calc-btn w-100">%</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="/"
                            class="btn operator calc-btn w-100">÷</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="7"
                            class="btn number calc-btn w-100">7</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="8"
                            class="btn number calc-btn w-100">8</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="9"
                            class="btn number calc-btn w-100">9</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="*"
                            class="btn operator calc-btn w-100">×</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="4"
                            class="btn number calc-btn w-100">4</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="5"
                            class="btn number calc-btn w-100">5</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="6"
                            class="btn number calc-btn w-100">6</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="-"
                            class="btn operator calc-btn w-100">-</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="1"
                            class="btn number calc-btn w-100">1</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="2"
                            class="btn number calc-btn w-100">2</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="3"
                            class="btn number calc-btn w-100">3</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="+"
                            class="btn operator calc-btn w-100">+</button>
                    </div>

                    <div class="col-6">
                        <button type="submit" name="key" value="0"
                            class="btn number calc-btn w-100">0</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="."
                            class="btn number calc-btn w-100">.</button>
                    </div>

                    <div class="col-3">
                        <button type="submit" name="key" value="="
                            class="btn equal calc-btn w-100">=</button>
                    </div>

                </div>

            </form>

        </div>
    </div>

    <!-- Premium Package Modal -->
    <div class="modal fade" id="premiumModal"
        tabindex="-1" aria-labelledby="premiumModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content border-0 shadow-lg"
                style="border-radius: 20px; background: #202b3c; color: white;">

                <div class="modal-header border-0">

                    <h5 class="modal-title w-100 text-center fw-bold text-warning"
                        id="premiumModalLabel">
                        ⭐Pay money to use calculator
                    </h5>

                    <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body p-4">

                    <p class="text-center fs-5">
                        Choose a package to continue!
                    </p>

                    <form method="POST" action="">

                        <!-- Basic -->
                        <label class="package-option d-block">

                            <input type="radio" name="package"
                                value="basic" required>

                            <div class="fs-4 fw-bold">$100</div>

                            <small>Only once</small>

                        </label>                        

                        <button type="submit" name="buy_now"
                            class="btn btn-warning btn-lg w-100 fw-bold mt-3 py-3"
                            style="border-radius: 12px;">

                            Buy Now

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <?php if ($show_premium): ?>
        <script>
            var myModal = new bootstrap.Modal(
                document.getElementById('premiumModal')
            );

            myModal.show();
        </script>
    <?php endif; ?>

</body>

</html>