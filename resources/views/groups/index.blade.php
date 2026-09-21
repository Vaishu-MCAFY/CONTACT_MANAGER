<html>
<head>
  <title>Contact Groups - Contact Manager</title>

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

.container {
max-width: 1200px;
margin: 0 auto;
padding: 30px;
}

.header {
display: flex;
justify-content: space-between;
align-items: center;

margin-bottom: 25px;


}

.header h1 {
font-size: 30px;
color: #333;
margin-bottom: 5px;
}

.header p {
color: #777;
font-size: 15px;
}

.add-btn {
display: inline-block;

padding: 12px 18px;

background: #667eea;
color: white;

text-decoration: none;

border-radius: 7px;

font-weight: bold;

transition: 0.3s;


}

.add-btn:hover {
background: #5568d8;
}

.success-message {
background: #d4edda;
color: #155724;

border: 1px solid #c3e6cb;

padding: 13px 16px;

border-radius: 7px;

margin-bottom: 20px;

font-weight: bold;


}


.table-container {
background: white;

border-radius: 10px;

box-shadow:
    0 2px 10px rgba(0, 0, 0, 0.08);

overflow-x: auto;


}


table {
width: 100%;

border-collapse: collapse;

min-width: 750px;


}


thead {
background: #667eea;
color: white;
}

th {
padding: 15px;


text-align: left;

font-size: 14px;

white-space: nowrap;


}

td {
padding: 15px;

border-bottom: 1px solid #eee;

vertical-align: middle;


}

tbody tr:hover {
background: #f8f9ff;
}

tbody tr:last-child td {
border-bottom: none;
}



td strong {
color: #333;
}

.view-btn,
.edit-btn,
.delete-btn {
display: inline-block;

padding: 8px 12px;

border-radius: 5px;

font-size: 13px;

font-weight: bold;

text-decoration: none;

border: none;

cursor: pointer;

margin-right: 5px;

transition: 0.3s;


}

.view-btn {
background: #17a2b8;
color: white;
}

.view-btn:hover {
background: #138496;
}


.edit-btn {
background: #ffc107;
color: #212529;
}

.edit-btn:hover {
background: #e0a800;
}


.delete-btn {
background: #dc3545;
color: white;
}

.delete-btn:hover {
background: #b02a37;
}

.empty {
text-align: center;

padding: 40px !important;

color: #777;

font-size: 16px;


}


@media (max-width: 768px) {


.container {
    padding: 15px;
}

.header {
    flex-direction: column;

    align-items: flex-start;

    gap: 15px;
}

.add-btn {
    width: 100%;

    text-align: center;
}

.table-container {
    width: 100%;

    overflow-x: auto;
}

th,
td {
    padding: 12px;
}

.view-btn,
.edit-btn,
.delete-btn {
    margin-bottom: 5px;
}

}
</style>

</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>Contact Groups</h1>
            <p>Organize your contacts into groups</p>
        </div>

        <a href="{{ route('groups.create') }}"
           class="add-btn">
            + Add Group
        </a>

    </div>

    @if(session('success'))

        <div class="success-message">
            {{ session('success') }}
        </div>

    @endif


    <div class="table-container">

        <table>

            <thead>

                <tr>
                    <th>#</th>
                    <th>Group Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

                @forelse($groups as $group)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <strong>{{ $group->name }}</strong>
                        </td>

                        <td>
                            {{ $group->description ?? 'No description' }}
                        </td>

                        <td>

                            <a href="{{ route('groups.show', $group) }}"
                               class="view-btn">
                                View
                            </a>

                            <a href="{{ route('groups.edit', $group) }}"
                               class="edit-btn">
                                Edit
                            </a>

                            <form action="{{ route('groups.destroy', $group) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Are you sure you want to delete this group?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="delete-btn">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4"
                            class="empty">

                            No groups found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>
