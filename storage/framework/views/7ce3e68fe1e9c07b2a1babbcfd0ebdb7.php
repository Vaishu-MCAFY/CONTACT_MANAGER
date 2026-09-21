<html>
<head>
    <title>Edit Contact - Contact Manager</title>

    <style>
 
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;

    min-height: 100vh;

    color: #333;
}

.container {
    width: 100%;
    min-height: 100vh;

    padding: 40px 20px;

    display: flex;
    justify-content: center;
    align-items: flex-start;
}

.form-card {
    width: 100%;
    max-width: 750px;

    background: #ffffff;

    padding: 35px;

    border-radius: 15px;

    box-shadow:
        0 10px 30px rgba(0, 0, 0, 0.18);
}

.form-card h1 {
    text-align: center;

    color: #333;

    font-size: 30px;

    margin-bottom: 8px;
}


.subtitle {
    text-align: center;

    color: #777;

    font-size: 15px;

    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 22px;
}


.form-group label {
    display: block;

    margin-bottom: 8px;

    font-weight: bold;

    color: #333;

    font-size: 15px;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;

    padding: 12px 14px;

    border: 1px solid #ccc;

    border-radius: 7px;

    background: #fff;

    color: #333;

    font-size: 15px;

    outline: none;

    transition: 0.3s;
}


.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #667eea;

    box-shadow:
        0 0 0 3px rgba(102, 126, 234, 0.15);
}


.form-group textarea {
    resize: vertical;

    min-height: 100px;
}

#phone-container {
    width: 100%;
}

.phone-row {
    display: flex;

    align-items: center;

    gap: 10px;

    width: 100%;

    margin-bottom: 12px;
}


.phone-row select {
    width: 150px;

    flex-shrink: 0;
}


.phone-row input {
    flex: 1;

    min-width: 0;
}

.add-phone-btn {
    display: inline-block;

    margin-top: 5px;

    padding: 10px 16px;

    border: none;

    border-radius: 7px;

    background: #667eea;

    color: white;

    font-size: 14px;

    cursor: pointer;

    transition: 0.3s;
}


.add-phone-btn:hover {
    background: #5568d9;

    transform: translateY(-1px);
}

.remove-btn {
    padding: 10px 13px;

    border: none;

    border-radius: 7px;

    background: #dc3545;

    color: white;

    font-size: 14px;

    cursor: pointer;

    white-space: nowrap;

    transition: 0.3s;
}


.remove-btn:hover {
    background: #b02a37;
}

.button-group {
    display: flex;

    gap: 12px;

    margin-top: 30px;
}

.save-btn {
    flex: 1;

    padding: 13px 20px;

    border: none;

    border-radius: 7px;

    background: #28a745;

    color: white;

    font-size: 16px;

    font-weight: bold;

    cursor: pointer;

    transition: 0.3s;
}


.save-btn:hover {
    background: #218838;

    transform: translateY(-1px);
}

.cancel-btn {
    flex: 1;

    padding: 13px 20px;

    border-radius: 7px;

    background: #6c757d;

    color: white;

    font-size: 16px;

    font-weight: bold;

    text-align: center;

    text-decoration: none;

    transition: 0.3s;
}


.cancel-btn:hover {
    background: #5a6268;

    transform: translateY(-1px);
}

.error-message {
    margin-bottom: 20px;

    padding: 14px 16px;

    background: #f8d7da;

    color: #721c24;

    border: 1px solid #f5c6cb;

    border-radius: 7px;
}


.error-message p {
    margin: 5px 0;
}

@media (max-width: 700px) {

    .container {
        padding: 20px 12px;
    }


    .form-card {
        padding: 25px 20px;
    }


    .phone-row {
        flex-direction: column;

        align-items: stretch;
    }


    .phone-row select {
        width: 100%;
    }


    .phone-row input {
        width: 100%;
    }


    .remove-btn {
        width: 100%;
    }


    .button-group {
        flex-direction: column;
    }


    .save-btn,
    .cancel-btn {
        width: 100%;
    }
}


@media (max-width: 450px) {

    .form-card {
        padding: 20px 15px;
    }


    .form-card h1 {
        font-size: 25px;
    }


    .subtitle {
        font-size: 14px;
    }


    .form-group input,
    .form-group select,
    .form-group textarea {
        font-size: 14px;

        padding: 11px;
    }
}

</style>

</head>

<body>

<div class="container">

    <div class="form-card">

        <h1>Edit Contact</h1>

        <p class="subtitle">
            Update contact information
        </p>


        <?php if($errors->any()): ?>

            <div class="error-message">

                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <p><?php echo e($error); ?></p>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        <?php endif; ?>


        <form
            action="<?php echo e(route('contacts.update', $contact)); ?>"
            method="POST">

            <?php echo csrf_field(); ?>

            <?php echo method_field('PUT'); ?>

            <div class="form-group">

                <label for="name">
                    Full Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="<?php echo e(old('name', $contact->name)); ?>"
                    placeholder="Enter full name"
                    required>

            </div>
            <div class="form-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?php echo e(old('email', $contact->email)); ?>"
                    placeholder="Enter email address">

            </div>
            <div class="form-group">

                <label>
                    Phone Numbers
                </label>

                <div id="phone-container">

                    <?php if($contact->phoneNumbers->count() > 0): ?>

                        <?php $__currentLoopData = $contact->phoneNumbers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="phone-row">

                                <select name="phone_labels[]">

                                    <option
                                        value="Personal"
                                        <?php echo e($phone->label == 'Personal' ? 'selected' : ''); ?>>
                                        Personal
                                    </option>

                                    <option
                                        value="Work"
                                        <?php echo e($phone->label == 'Work' ? 'selected' : ''); ?>>
                                        Work
                                    </option>

                                    <option
                                        value="Home"
                                        <?php echo e($phone->label == 'Home' ? 'selected' : ''); ?>>
                                        Home
                                    </option>

                                    <option
                                        value="Other"
                                        <?php echo e($phone->label == 'Other' ? 'selected' : ''); ?>>
                                        Other
                                    </option>

                                </select>


                                <input
                                    type="text"
                                    name="phone_numbers[]"
                                    value="<?php echo e($phone->phone); ?>"
                                    placeholder="Enter phone number"
                                    required>


                                <button
                                    type="button"
                                    class="remove-btn"
                                    onclick="removePhone(this)">

                                    Remove

                                </button>

                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php else: ?>
                        <div class="phone-row">

                            <select name="phone_labels[]">

                                <option value="Personal">
                                    Personal
                                </option>

                                <option value="Work">
                                    Work
                                </option>

                                <option value="Home">
                                    Home
                                </option>

                                <option value="Other">
                                    Other
                                </option>

                            </select>


                            <input
                                type="text"
                                name="phone_numbers[]"
                                value="<?php echo e(old('phone_numbers.0', $contact->phone)); ?>"
                                placeholder="Enter phone number"
                                required>


                            <button
                                type="button"
                                class="remove-btn"
                                onclick="removePhone(this)">

                                Remove

                            </button>

                        </div>

                    <?php endif; ?>

                </div>


                <button
                    type="button"
                    class="add-phone-btn"
                    onclick="addPhone()">

                    + Add Another Phone

                </button>

            </div>
            <div class="form-group">

                <label for="group_id">
                    Contact Group
                </label>

                <select
                    name="group_id"
                    id="group_id">

                    <option value="">
                        -- Select Group --
                    </option>

                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option
                            value="<?php echo e($group->id); ?>"
                            <?php echo e(old('group_id', $contact->group_id) == $group->id ? 'selected' : ''); ?>>

                            <?php echo e($group->name); ?>


                        </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

            </div>
            <div class="form-group">

                <label for="address">
                    Address
                </label>

                <textarea
                    id="address"
                    name="address"
                    rows="4"
                    placeholder="Enter address"><?php echo e(old('address', $contact->address)); ?></textarea>

            </div>
            <div class="button-group">

                <button
                    type="submit"
                    class="save-btn">

                    Update Contact

                </button>


                <a
                    href="<?php echo e(route('contacts.index')); ?>"
                    class="cancel-btn">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>


<script>

function addPhone()
{
    const container =
        document.getElementById('phone-container');

    const row =
        document.createElement('div');

    row.className = 'phone-row';

    row.innerHTML = `

        <select name="phone_labels[]">

            <option value="Personal">
                Personal
            </option>

            <option value="Work">
                Work
            </option>

            <option value="Home">
                Home
            </option>

            <option value="Other">
                Other
            </option>

        </select>


        <input
            type="text"
            name="phone_numbers[]"
            placeholder="Enter phone number"
            required>


        <button
            type="button"
            class="remove-btn"
            onclick="removePhone(this)">

            Remove

        </button>

    `;

    container.appendChild(row);
}


function removePhone(button)
{
    const container =
        document.getElementById('phone-container');

    const rows =
        container.querySelectorAll('.phone-row');


    if (rows.length > 1)
    {
        button.parentElement.remove();
    }
    else
    {
        alert('At least one phone number is required.');
    }
}

</script>

</body>

</html>

<?php /**PATH D:\contact_manager\resources\views/contacts/edit.blade.php ENDPATH**/ ?>