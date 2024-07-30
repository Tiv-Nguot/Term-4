<template>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <h1 class="mb-4">Student Information Form</h1>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input
            type="text"
            id="name"
            class="form-control"
          />
        </div>
        <div class="mb-3">
          <label for="gender" class="form-label">Gender</label>
          <select id="gender" class="form-select">
            <option value="" disabled>Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="dob" class="form-label">Date of Birth</label>
          <input
            type="date"
            id="dob"
            class="form-control"
          />
        </div>
        <div class="mb-3">
          <label for="subject" class="form-label">Subject</label>
          <input
            type="text"
            id="subject"
            class="form-control"
          />
        </div>
        <div class="mb-3">
          <label for="score" class="form-label">Score</label>
          <input
            type="number"
            id="score"
            class="form-control"
          />
        </div>
      </div>
      <div class="col-md-6">
        <div class="mt-4">
          <h2>Student Information</h2>
          <p>Name: </p>
          <p>Gender: </p>
          <p>Date of Birth: </p>
          <p>Subject: </p>
          <p>Score: </p>
          <p>Status: </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "App",
};
</script>

<style>
body {
  margin-top: 50px;
}
</style>
