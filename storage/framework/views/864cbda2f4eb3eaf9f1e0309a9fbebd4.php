<html>
<head>
    <title>
        <?php echo e($group->name); ?> - Contact Manager
    </title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;

            min-height: 100vh;

            padding: 40px 20px;
        }

        .container {
            width: 100%;
        }

        .details-card {
            max-width: 900px;

            margin: auto;

            background: white;

            padding: 30px;

            border-radius: 12px;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.10);
        }

        .header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 30px;
        }

        .header h1 {
            color: #333;

            margin-bottom: 5px;
        }

        .header p {
            color: #777;
        }

        .back-btn {
            background: #e5e7eb;

            color: #333;

            padding: 10px 15px;

            border-radius: 6px;

            text-decoration: none;
        }

        .back-btn:hover {
            background: #d1d5db;
        }

        .group-info {
            background: #f5f7ff;

            padding: 25px;

            border-radius: 10px;

            margin-bottom: 30px;
        }

        .group-info h2 {
            color: #4f46e5;

            margin-bottom: 10px;
        }

        .group-info p {
            color: #666;

            line-height: 1.6;
        }

        .section-title {
            margin-bottom: 15px;

            color: #333;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;

            text-align: left;

            border-bottom: 1px solid #eee;
        }

        th {
            background: #f5f7ff;

            color: #444;
        }

        td {
            color: #555;
        }

        .no-contacts {
            text-align: center;

            padding: 30px;

            color: #777;
        }

        .action-buttons {
            margin-top: 25px;

            display: flex;

            justify-content: flex-end;

            gap: 10px;
        }

        .edit-btn {
            background: #4f46e5;

            color: white;

            padding: 10px 18px;

            border-radius: 6px;

            text-decoration: none;
        }

        .edit-btn:hover {
            background: #4338ca;
        }

        .contacts-btn {
            background: #198754;

            color: white;

            padding: 10px 18px;

            border-radius: 6px;

            text-decoration: none;
        }

        .contacts-btn:hover {
            background: #157347;
        }

        @media (max-width: 600px) {

            body {
                padding: 20px 10px;
            }

            .details-card {
                padding: 20px;
            }

            .header {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .edit-btn,
            .contacts-btn {
                text-align: center;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="details-card">

        <div class="header">

            <div>

                <h1>
                    Group Details
                </h1>

                <p>
                    View group information and contacts
                </p>

            </div>

            <a
                href="<?php echo e(route('groups.index')); ?>"
                class="back-btn">

                ← Back

            </a>

        </div>

        <div class="group-info">

            <h2>
                <?php echo e($group->name); ?>

            </h2>

            <p>

                <?php echo e($group->description ?? 'No description available.'); ?>


            </p>

        </div>

        <h2 class="section-title">
            Contacts in this Group
        </h2>


        <?php if($group->contacts->count() > 0): ?>

            <div class="table-container">

                <table>

                    <thead>

                        <tr>

                            <th>
                                #
                            </th>

                            <th>
                                Name
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Phone
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php $__currentLoopData = $group->contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>

                                <td>
                                    <?php echo e($loop->iteration); ?>

                                </td>

                                <td>

                                    <strong>
                                        <?php echo e($contact->name); ?>

                                    </strong>

                                </td>

                                <td>

                                    <?php echo e($contact->email ?? 'Not provided'); ?>


                                </td>

                                <td>

                                    <?php echo e($contact->phone ?? 'Not provided'); ?>


                                </td>

                                <td>

                                    <a
                                        href="<?php echo e(route('contacts.show', $contact)); ?>"
                                        class="contacts-btn">

                                        View

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>

            </div>

        <?php else: ?>

            <div class="no-contacts">

                <p>
                    No contacts found in this group.
                </p>

            </div>

        <?php endif; ?>

        <div class="action-buttons">

            <a
                href="<?php echo e(route('groups.edit', $group)); ?>"
                class="edit-btn">

                Edit Group

            </a>

            <a
                href="<?php echo e(route('contacts.create')); ?>"
                class="contacts-btn">

                + Add Contact

            </a>

        </div>

    </div>

</div>

</body>

</html>

<?php /**PATH D:\contact_manager\resources\views/groups/show.blade.php ENDPATH**/ ?>