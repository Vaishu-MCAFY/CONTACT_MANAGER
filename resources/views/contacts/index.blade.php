<html>
<head>

    <title>Contacts - Contact Manager</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            min-height: 100vh;
            padding: 30px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin-bottom: 5px;
        }

        .header p {
            color: #777;
        }

        .add-btn {
            background: #4f46e5;
            color: white;
            padding: 12px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #4338ca;
        }

        .success-message {
            background: #d1fae5;
            color: #065f46;
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .search-box {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            background: white;
            padding: 15px;
            border-radius: 8px;
        }

        .search-box input,
        .search-box select {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        .search-box input {
            flex: 1;
        }

        .search-box select {
            min-width: 180px;
            background: white;
        }

        .search-box button {
            padding: 12px 20px;
            background: #4f46e5;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .search-box button:hover {
            background: #4338ca;
        }

        .table-container {
            background: white;
            border-radius: 10px;
            overflow-x: auto;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f1f3f5;
            color: #333;
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        tr:hover {
            background: #f9fafb;
        }

        .group-badge {
            display: inline-block;
            background: #eef2ff;
            color: #4338ca;
            padding: 5px 9px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }

        .no-group {
            color: #999;
            font-size: 13px;
        }

        .phone-list {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .phone-item {
            font-size: 13px;
        }

        .phone-label {
            font-weight: bold;
            color: #555;
        }

        .view-btn,
        .edit-btn,
        .delete-btn {
            display: inline-block;
            padding: 7px 10px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
        }

        .view-btn {
            background: #2563eb;
            color: white;
        }

        .view-btn:hover {
            background: #1d4ed8;
        }

        .edit-btn {
            background: #f59e0b;
            color: white;
        }

        .edit-btn:hover {
            background: #d97706;
        }

        .delete-btn {
            background: #dc2626;
            color: white;
        }

        .delete-btn:hover {
            background: #b91c1c;
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 30px;
        }

        @media (max-width: 700px) {

            body {
                padding: 15px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .search-box {
                flex-direction: column;
            }

            .search-box select {
                width: 100%;
            }

            table {
                min-width: 950px;
            }
        }

    </style>

</head>


<body>

<div class="container">
    <div class="header">

        <div>

            <h1>My Contacts</h1>

            <p>
                Manage all your contacts
            </p>

        </div>


        <a href="{{ route('contacts.create') }}"
           class="add-btn">

            + Add Contact

        </a>

    </div>

    @if(session('success'))

        <div class="success-message">

            {{ session('success') }}

        </div>

    @endif

    <form method="GET"
          action="{{ route('contacts.index') }}"
          class="search-box">

        <input
            type="text"
            name="search"
            placeholder="Search contacts..."
            value="{{ request('search') }}">


        <select name="group_id">

            <option value="">
                All Groups
            </option>

            @foreach($groups as $group)

                <option
                    value="{{ $group->id }}"
                    {{ request('group_id') == $group->id ? 'selected' : '' }}>

                    {{ $group->name }}

                </option>

            @endforeach

        </select>


        <button type="submit">
            Search
        </button>

    </form>

    <div class="table-container">

        <table>

            <thead>

                <tr>

                    <th>#</th>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Phone Numbers</th>

                    <th>Group</th>

                    <th>Address</th>

                    <th>Actions</th>

                </tr>

            </thead>


            <tbody>

                @forelse($contacts as $contact)

                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>

                            <strong>
                                {{ $contact->name }}
                            </strong>

                        </td>
                        <td>

                            {{ $contact->email ?? 'N/A' }}

                        </td>
                        <td>

                            <div class="phone-list">

                                @forelse($contact->phoneNumbers as $phone)

                                    <div class="phone-item">

                                        <span class="phone-label">
                                            {{ $phone->label }}:
                                        </span>

                                        {{ $phone->phone }}

                                    </div>

                                @empty

                                    {{ $contact->phone ?? 'N/A' }}

                                @endforelse

                            </div>

                        </td>

                        <td>

                            @if($contact->group)

                                <span class="group-badge">

                                    {{ $contact->group->name }}

                                </span>

                            @else

                                <span class="no-group">
                                    Not Assigned
                                </span>

                            @endif

                        </td>
                        <td>

                            {{ $contact->address ?? 'N/A' }}

                        </td>
                        <td>
                            <a
                                href="{{ route('contacts.show', $contact) }}"
                                class="view-btn">

                                View

                            </a>
                            <a
                                href="{{ route('contacts.edit', $contact) }}"
                                class="edit-btn">

                                Edit

                            </a>
                            
                            <form
                                action="{{ route('contacts.destroy', $contact) }}"
                                method="POST"
                                style="display:inline;"
                                onsubmit="return confirm('Are you sure you want to delete this contact?');">

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-btn">

                                    Delete

                                </button>

                            </form>


                        </td>

                    </tr>


                @empty

                    <tr>

                        <td colspan="7"
                            class="empty">

                            No contacts found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>

</html>
