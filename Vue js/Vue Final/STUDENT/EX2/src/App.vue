<template>
  <div class="container">
    <!-- Add User Form -->
    <div class="row">
      <div class="col-md-6 mx-auto">
        <form @submit.prevent="addUser" class="mb-3">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Name">
            <input type="email" class="form-control" placeholder="Email">
            <button type="submit" class="btn btn-primary">Add User</button>
          </div>
        </form>
      </div>
    </div>

    <!-- User List -->
    <div class="row">
      <div class="col-md-6 mx-auto">
        <ul class="list-group">
          <li>
            <div>
              <span></span> - <span></span>
              <button  class="btn btn-danger btn-sm float-end">Remove</button>
              <button  class="btn btn-primary btn-sm float-end me-2">Edit</button>
            </div>
            <div>
              <div class="input-group">
                <input type="text" class="form-control">
                <input type="email" class="form-control">
                <button  class="btn btn-success btn-sm">Save</button>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: [
        { name: 'Alice', email: 'alice@example.com', editMode: false },
        { name: 'Bob', email: 'bob@example.com', editMode: false },
        { name: 'Charlie', email: 'charlie@example.com', editMode: false }
      ],
      newUser: { name: '', email: '' }
    };
  },
  methods: {
    addUser() {

    },
    removeUser() {

    },
    toggleEditMode() {

    },
    saveUserEdit() {
   
    }
  }
};
</script>

<style>

</style>
