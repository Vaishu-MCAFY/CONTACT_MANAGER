<html>
<head>

    <title>Dashboard - Contact Manager</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f6fa;
            color: #333;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: auto;
            padding: 30px;
        }


        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }


        .dashboard-header h1 {
            margin-bottom: 5px;
        }


        .dashboard-header p {
            color: #666;
        }


        .dashboard-actions {
            display: flex;
            gap: 10px;
        }


        .add-btn,
        .group-btn {
            color: white;
            text-decoration: none;
            padding: 11px 16px;
            border-radius: 6px;
            font-weight: bold;
        }


        .add-btn {
            background: #667eea;
        }


        .add-btn:hover {
            background: #5568d8;
        }


        .group-btn {
            background: #6f42c1;
        }


        .group-btn:hover {
            background: #59339d;
        }

        .dashboard-nav {
            background: white;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }


        .dashboard-nav a {
            text-decoration: none;
            margin-right: 25px;
            color: #333;
            font-weight: bold;
        }


        .dashboard-nav a:hover {
            color: #667eea;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }


        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }


        .stat-icon {
            font-size: 35px;
        }


        .stat-card h3 {
            color: #666;
            font-size: 15px;
            margin-bottom: 5px;
        }


        .stat-card h2 {
            font-size: 30px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }


        .dashboard-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }


        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }


        .card-header a {
            text-decoration: none;
            color: #667eea;
        }

        .recent-contact {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 14px 0;
            border-bottom: 1px solid #eee;
        }


        .recent-contact:last-child {
            border-bottom: none;
        }


        .contact-avatar {
            width: 45px;
            height: 45px;
            min-width: 45px;
            border-radius: 50%;
            background: #667eea;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }


        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 3px;
            flex: 1;
        }


        .contact-info span {
            color: #666;
            font-size: 13px;
        }


        .contact-info small {
            color: #667eea;
        }


        .view-contact {
            text-decoration: none;
            color: #667eea;
            font-size: 14px;
            font-weight: bold;
        }

        .group-stat {
            margin-bottom: 20px;
        }


        .group-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }


        .group-info span {
            color: #666;
            font-size: 13px;
        }


        .progress-container {
            width: 100%;
            height: 9px;
            background: #eee;
            border-radius: 10px;
            overflow: hidden;
        }


        .progress-bar {
            height: 100%;
            background: #667eea;
            border-radius: 10px;
        }


        .no-data {
            color: #777;
            text-align: center;
            padding: 20px 0;
        }

        @media (max-width: 768px) {

            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }


            .dashboard-actions {
                width: 100%;
                flex-direction: column;
            }


            .add-btn,
            .group-btn {
                text-align: center;
            }


            .stats-grid {
                grid-template-columns: 1fr;
            }


            .dashboard-grid {
                grid-template-columns: 1fr;
            }


            .dashboard-container {
                padding: 15px;
            }


            .dashboard-nav a {
                display: inline-block;
                margin-bottom: 10px;
            }


            .recent-contact {
                align-items: flex-start;
            }

        }

    </style>

</head>


<body>


<div class="dashboard-container">

    <div class="dashboard-header">

        <div>

            <h1>Contact Manager</h1>

            <p>
                Manage your contacts easily
            </p>

        </div>


        <div class="dashboard-actions">

            <a href="<?php echo e(route('contacts.create')); ?>"
               class="add-btn">

                + Add Contact

            </a>


            <a href="<?php echo e(route('groups.create')); ?>"
               class="group-btn">

                + Add Group

            </a>

        </div>

    </div>

    <div class="dashboard-nav">

        <a href="<?php echo e(route('dashboard')); ?>">
            Dashboard
        </a>


        <a href="<?php echo e(route('contacts.index')); ?>">
            Contacts
        </a>


        <a href="<?php echo e(route('groups.index')); ?>">
            Groups
        </a>

    </div>

    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-icon">
                👤
            </div>

            <div>

                <h3>
                    Total Contacts
                </h3>

                <h2>
                    <?php echo e($totalContacts); ?>

                </h2>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon">
                👥
            </div>

            <div>

                <h3>
                    Total Groups
                </h3>

                <h2>
                    <?php echo e($totalGroups); ?>

                </h2>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon">
                📱
            </div>

            <div>

                <h3>
                    Phone Numbers
                </h3>

                <h2>
                    <?php echo e($totalPhoneNumbers); ?>

                </h2>

            </div>

        </div>

    </div>

    <div class="dashboard-grid">

        <div class="dashboard-card">

            <div class="card-header">

                <h2>
                    Recent Contacts
                </h2>

                <a href="<?php echo e(route('contacts.index')); ?>">
                    View All
                </a>

            </div>


            <?php $__empty_1 = true; $__currentLoopData = $recentContacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="recent-contact">

                    <div class="contact-avatar">

                        <?php echo e(strtoupper(
                            substr($contact->name, 0, 1)
                        )); ?>


                    </div>

                    <div class="contact-info">

                        <strong>
                            <?php echo e($contact->name); ?>

                        </strong>


                        <span>

                            <?php echo e($contact->email
                                ?? 'No email'); ?>


                        </span>


                        <?php if($contact->group): ?>

                            <small>

                                Group:
                                <?php echo e($contact->group->name); ?>


                            </small>

                        <?php endif; ?>

                    </div>

                    <a href="<?php echo e(route(
                        'contacts.show',
                        $contact
                    )); ?>"
                       class="view-contact">

                        View

                    </a>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <p class="no-data">
                    No contacts available.
                </p>

            <?php endif; ?>

        </div>
        <div class="dashboard-card">

            <div class="card-header">

                <h2>
                    Contacts by Group
                </h2>

                <a href="<?php echo e(route('groups.index')); ?>">
                    View Groups
                </a>

            </div>


            <?php

                $maxContacts = $groups->max('contacts_count');

            ?>


            <?php $__empty_1 = true; $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="group-stat">

                    <div class="group-info">

                        <strong>
                            <?php echo e($group->name); ?>

                        </strong>

                        <span>
                            <?php echo e($group->contacts_count); ?>

                            contacts
                        </span>

                    </div>


                    <div class="progress-container">

                        <div class="progress-bar"
                             style="width:
                                <?php echo e($maxContacts > 0
                                    ? ($group->contacts_count / $maxContacts) * 100
                                    : 0); ?>%;">

                        </div>

                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <p class="no-data">
                    No groups available.
                </p>

            <?php endif; ?>

        </div>

    </div>

</div>


</body>

</html>

<?php /**PATH D:\contact_manager\resources\views/dashboard.blade.php ENDPATH**/ ?>