<html>

<head>

<title>Add Group - Contact Manager</title>

<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        min-height: 100vh;
        padding: 40px;
    }

    .form-container {
        width: 100%;
        max-width: 650px;
        margin: 0 auto;
    }

    .form-card {
        background: white;
        padding: 35px;
        border-radius: 15px;

        box-shadow:
            0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .form-card h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
        font-size: 30px;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px 14px;

        border: 1px solid #ccc;
        border-radius: 8px;

        font-size: 15px;
        outline: none;

        transition: 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #667eea;

        box-shadow:
            0 0 0 3px rgba(102, 126, 234, 0.15);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .error {
        margin-top: 6px;
        color: #dc3545;
        font-size: 14px;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
    }

    .back-btn {
        text-decoration: none;
        padding: 12px 22px;

        background: #6c757d;
        color: white;

        border-radius: 8px;
        font-weight: bold;

        transition: 0.3s;
    }

    .back-btn:hover {
        background: #5a6268;
    }

    .submit-btn {
        border: none;
        padding: 12px 22px;

        background: #6f42c1;
        color: white;

        border-radius: 8px;

        font-size: 15px;
        font-weight: bold;

        cursor: pointer;

        transition: 0.3s;
    }

    .submit-btn:hover {
        background: #59339d;
    }

    @media (max-width: 600px) {

        body {
            padding: 20px;
        }

        .form-card {
            padding: 25px;
        }

        .form-actions {
            flex-direction: column;
            gap: 12px;
        }

        .back-btn,
        .submit-btn {
            width: 100%;
            text-align: center;
        }
    }

</style>

</head>

<body>

<div class="form-container">

<div class="form-card">

    <h1>Add New Group</h1>


    <form action="<?php echo e(route('groups.store')); ?>"
          method="POST">

        <?php echo csrf_field(); ?>

        <div class="form-group">

            <label for="name">
                Group Name
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="<?php echo e(old('name')); ?>"
                placeholder="Enter group name"
                required
            >


            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                <p class="error">
                    <?php echo e($message); ?>

                </p>

            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>

        <div class="form-group">

            <label for="description">
                Description
            </label>

            <textarea
                id="description"
                name="description"
                placeholder="Enter group description"
            ><?php echo e(old('description')); ?></textarea>


            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                <p class="error">
                    <?php echo e($message); ?>

                </p>

            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>

        <div class="form-actions">

            <a
                href="<?php echo e(route('groups.index')); ?>"
                class="back-btn"
            >
                Back
            </a>


            <button
                type="submit"
                class="submit-btn"
            >
                Add Group
            </button>

        </div>

    </form>

</div>
</div>

</body>

</html>
<?php /**PATH D:\contact_manager\resources\views/groups/create.blade.php ENDPATH**/ ?>