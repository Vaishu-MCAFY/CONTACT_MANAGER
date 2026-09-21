<html>
<head>
    <title>
        {{ $contact->name }} - Contact Manager
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
            background: white;
            max-width: 750px;
            margin: auto;
            padding: 30px;
            border-radius: 12px;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.10);
        }

        .details-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .details-header h1 {
            margin-bottom: 5px;
        }

        .details-header p {
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

        .profile-section {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 25px;
            background: #f5f7ff;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .profile-icon {
            width: 70px;
            height: 70px;

            border-radius: 50%;

            background: #4f46e5;
            color: white;

            display: flex;
            justify-content: center;
            align-items: center;

            font-size: 30px;
            font-weight: bold;
        }

        .profile-section h2 {
            margin-bottom: 5px;
        }

        .profile-section p {
            color: #777;
        }

        .details-list {
            border-top: 1px solid #eee;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            gap: 20px;

            padding: 18px 5px;

            border-bottom: 1px solid #eee;
        }

        .detail-label {
            font-weight: bold;
            color: #555;
            min-width: 120px;
        }

        .detail-value {
            color: #333;
            text-align: right;
            word-break: break-word;
        }

        .details-actions {
            margin-top: 25px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .edit-btn {
            background: #4f46e5;
            color: white;

            padding: 11px 18px;

            border-radius: 6px;

            text-decoration: none;
            font-weight: bold;
        }

        .edit-btn:hover {
            background: #4338ca;
        }

        @media (max-width: 600px) {

            .details-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .detail-item {
                flex-direction: column;
                gap: 5px;
            }

            .detail-value {
                text-align: left;
            }

            .profile-section {
                padding: 20px;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="details-card">
        <div class="details-header">

            <div>

                <h1>
                    Contact Details
                </h1>

                <p>
                    Complete contact information
                </p>

            </div>

            <a
                href="{{ route('contacts.index') }}"
                class="back-btn">

                ← Back

            </a>

        </div>

        <div class="profile-section">

            <div class="profile-icon">

                {{ strtoupper(substr($contact->name, 0, 1)) }}

            </div>

            <div>

                <h2>
                    {{ $contact->name }}
                </h2>

                <p>
                    Contact
                </p>

            </div>

        </div>

        <div class="details-list">

            <div class="detail-item">

                <span class="detail-label">
                    Full Name
                </span>

                <span class="detail-value">
                    {{ $contact->name }}
                </span>

            </div>


            <div class="detail-item">

                <span class="detail-label">
                    Email
                </span>

                <span class="detail-value">

                    {{ $contact->email ?? 'Not provided' }}

                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Phone
                </span>

                <span class="detail-value">

                    @forelse($contact->phoneNumbers as $phone)

                        <div>
                            <strong>
                                {{ $phone->label }}:
                            </strong>

                            {{ $phone->phone }}
                        </div>

                    @empty

                        {{ $contact->phone ?? 'Not provided' }}

                    @endforelse

                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Group
                </span>

                <span class="detail-value">

                    {{ $contact->group->name ?? 'No Group' }}

                </span>

            </div>
            <div class="detail-item">

                <span class="detail-label">
                    Address
                </span>

                <span class="detail-value">

                    {{ $contact->address ?? 'Not provided' }}

                </span>

            </div>
            <div class="detail-item">

                <span class="detail-label">
                    Added On
                </span>

                <span class="detail-value">

                    {{ $contact->created_at->format('d M Y, h:i A') }}

                </span>

            </div>

        </div>
        <div class="details-actions">

            <a
                href="{{ route('contacts.edit', $contact) }}"
                class="edit-btn">

                Edit Contact

            </a>

        </div>

    </div>

</div>

</body>

</html>
