<html>
<head>
    <title>Add Contact - Contact Manager</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #333;
        }

        .container {
            width: 100%;
            padding: 20px;
        }

        .form-card {
            width: 90%;
            max-width: 700px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }

        .form-card h1 {
            text-align: center;
            margin-bottom: 10px;
            color: #333;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            background: white;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.15);
        }

        .form-group textarea {
            resize: vertical;
        }


        .phone-row {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
            align-items: center;
        }

        .phone-row select {
            width: 150px;
            flex-shrink: 0;
        }

        .phone-row input {
            flex: 1;
        }

        .remove-btn {
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #dc3545;
            color: white;
            cursor: pointer;
            white-space: nowrap;
        }

        .remove-btn:hover {
            background: #b02a37;
        }

        .add-phone-btn {
            margin-top: 8px;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            background: #667eea;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .add-phone-btn:hover {
            background: #5568d9;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .save-btn,
        .cancel-btn {
            flex: 1;
            padding: 12px;
            text-align: center;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
        }

        .save-btn {
            background: #28a745;
            color: white;
        }

        .save-btn:hover {
            background: #218838;
        }

        .cancel-btn {
            background: #6c757d;
            color: white;
        }

        .cancel-btn:hover {
            background: #5a6268;
        }

        .success-message {
            padding: 12px;
            margin-bottom: 20px;
            background: #d4edda;
            color: #155724;
            border-radius: 6px;
        }

        .error-message {
            padding: 12px;
            margin-bottom: 20px;
            background: #f8d7da;
            color: #721c24;
            border-radius: 6px;
        }

        .error-message p {
            margin: 5px 0;
        }

        .required {
            color: red;
        }

        @media (max-width: 600px) {

            .form-card {
                width: 100%;
                margin: 20px auto;
                padding: 20px;
            }

            .phone-row {
                flex-direction: column;
                align-items: stretch;
            }

            .phone-row select {
                width: 100%;
            }

            .remove-btn {
                width: 100%;
            }

            .button-group {
                flex-direction: column;
            }
        }

    </style>

</head>

<body>

<div class="container">

    <div class="form-card">

        <h1>Add Contact</h1>

        <p class="subtitle">
            Add a new contact to your contact manager
        </p>


        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="success-message">
                {{ session('success') }}
            </div>

        @endif


        {{-- VALIDATION ERRORS --}}

        @if($errors->any())

            <div class="error-message">

                @foreach($errors->all() as $error)

                    <p>{{ $error }}</p>

                @endforeach

            </div>

        @endif


        {{-- CONTACT FORM --}}

        <form
            action="{{ route('contacts.store') }}"
            method="POST">

            @csrf


            {{-- NAME --}}

            <div class="form-group">

                <label for="name">
                    Full Name
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter full name"
                    required>

            </div>


            {{-- EMAIL --}}

            <div class="form-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter email address">

            </div>


            {{-- PHONE NUMBERS --}}

            <div class="form-group">

                <label>
                    Phone Numbers
                    <span class="required">*</span>
                </label>


                <div id="phone-container">

                    {{-- FIRST PHONE --}}

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
                            placeholder="Enter phone number"
                            value="{{ old('phone_numbers.0') }}"
                            required>


                        <button
                            type="button"
                            class="remove-btn"
                            onclick="removePhone(this)">

                            Remove

                        </button>

                    </div>

                </div>


                {{-- ADD PHONE --}}

                <button
                    type="button"
                    class="add-phone-btn"
                    onclick="addPhone()">

                    + Add Another Phone

                </button>

            </div>


            {{-- CONTACT GROUP --}}

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


                    @foreach($groups as $group)

                        <option
                            value="{{ $group->id }}"
                            {{ old('group_id') == $group->id ? 'selected' : '' }}>

                            {{ $group->name }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- ADDRESS --}}

            <div class="form-group">

                <label for="address">
                    Address
                </label>

                <textarea
                    id="address"
                    name="address"
                    rows="4"
                    placeholder="Enter address">{{ old('address') }}</textarea>

            </div>


            {{-- BUTTONS --}}

            <div class="button-group">

                <button
                    type="submit"
                    class="save-btn">

                    Save Contact

                </button>


                <a
                    href="{{ route('contacts.index') }}"
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
            alert(
                'At least one phone number is required.'
            );
        }
    }

</script>


</body>

</html>