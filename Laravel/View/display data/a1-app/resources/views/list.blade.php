<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>List</title>
</head>

<body>
    <div class="container mt-3">
        <h1>List of Students</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add Student</button>
        <table class="table mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Province</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th> <!-- New column for actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->province }}</td>
                    <td>{{ $student->created_at }}</td>
                    <td>{{ $student->updated_at }}</td>
                    <td>
                        <!-- Edit Button -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$student->id}}">
                            Edit
                        </button>
                        <!-- Delete Button -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$student->id}}">
                            Delete
                        </button>
                    </td>
                </tr>

                <!-- Add Student Modal -->
                <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addStudentForm">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="text" class="form-control" id="age" name="age">
                                    </div>
                                    <div class="mb-3">
                                        <label for="province" class="form-label">Province</label>
                                        <input type="text" class="form-control" id="province" name="province">
                                    </div>
                                    <!-- Add more fields as needed -->
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="addStudentBtn">Add Student</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{$student->id}}" tabindex="-1" aria-labelledby="editModal{{$student->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModal{{$student->id}}Label">Edit Student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm{{$student->id}}">
                                    <!-- Add form fields to update student's information -->
                                    <div class="mb-3">
                                        <label for="name{{$student->id}}" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name{{$student->id}}" value="{{$student->name}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="age{{$student->id}}" class="form-label">Age</label>
                                        <input type="number" class="form-control" id="age{{$student->id}}" value="{{$student->age}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="province{{$student->id}}" class="form-label">Province</label>
                                        <input type="text" class="form-control" id="province{{$student->id}}" value="{{$student->province}}">
                                    </div>
                                    <!-- Add more fields as needed -->
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary edit-student-btn" data-bs-toggle="modal" data-bs-target="#editModal{{$student->id}}" data-student-id="{{$student->id}}">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{$student->id}}" tabindex="-1" aria-labelledby="deleteModal{{$student->id}}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModal{{$student->id}}Label">Delete Student</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this student?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger delete-student-btn" data-bs-toggle="modal" data-bs-target="#deleteModal{{$student->id}}" data-student-id="{{$student->id}}">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Add event listener to all delete buttons
            $('.delete-student-btn').on('click', function() {
                // Get the student ID from the data attribute
                const studentId = $(this).data('student-id');

                // Send an AJAX request to delete the student
                $.ajax({
                    url: `/students/delete/${studentId}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    success: function(data) {
                        if (data.success) {
                            // Reload the page or update the UI as needed
                            location.reload();
                        } else {
                            // Handle error
                            console.error('Error deleting student:', data.message);
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Add event listener to all edit buttons
            $('.edit-student-btn').on('click', function() {
                // Get the student ID from the data attribute
                const studentId = $(this).data('student-id');

                // Get the form fields
                const name = $('#name' + studentId).val();
                const age = $('#age' + studentId).val();
                const province = $('#province' + studentId).val();

                // Send an AJAX request to update the student
                $.ajax({
                    url: `/students/update/${studentId}`,
                    type: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    data: JSON.stringify({
                        name: name,
                        age: age,
                        province: province
                        // Add more fields as needed
                    }),
                    success: function(data) {
                        if (data.success) {
                            // Reload the page or update the UI as needed
                            location.reload();
                        } else {
                            // Handle error
                            console.error('Error updating student:', data.message);
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#addStudentBtn').on('click', function() {
                const name = $('#name').val();
                const age = $('#age').val();
                const province = $('#province').val();

                $.ajax({
                    url: '/students/create',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    data: JSON.stringify({
                        name: name,
                        age: age,
                        province: province
                        // Add more fields as needed
                    }),
                    success: function(data) {
                        if (data.success) {
                            // Reload the page or update the UI as needed
                            location.reload();
                        } else {
                            // Handle error
                            console.error('Error creating student:', data.message);
                        }
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>

</body>

</html>