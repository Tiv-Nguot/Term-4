<template>
  <div v-if="employee" class="card mt-4 shadow text-center">
    <div class="mx-auto rounded-circle overflow-hidden" style="width: 100px; height: 100px;">
      <img :src="employee.image" class="img-fluid" alt="Employee Image">
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ employee.name }}</h5>
      <p class="card-text"><strong>Email:</strong> {{ employee.email }}</p>
      <p class="card-text"><strong>Phone:</strong> {{ employee.phone }}</p>
    </div>
  </div>
  <div v-else class="card mt-4 shadow text-center">
    <div class="card-body">
      <p>No employee selected</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "EmployeeCard",
  props: {
    employee: Object
  }
};
</script>

<style>
.card {
  border: none;
}

.card-body {
  padding: 1rem;
}

.card-title {
  font-size: 1.25rem;
  font-weight: bold;
  margin-bottom: 0.5rem;
}

.card-text {
  font-size: 1rem;
}

.rounded-circle {
  margin: 0 auto;
}
</style>
