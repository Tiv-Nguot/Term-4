<template>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="employee in employees" :key="employee.id">
        <td>{{ employee.name }}</td>
        <td>{{ employee.email }}</td>
        <td>{{ employee.phone }}</td>
        <td>
          <button class="btn btn-info btn-sm" @click="detailEmployee(employee.id)">Details</button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  name: 'EmployeeTable',
  props: {
    employees: Array,
  },
  methods: {
    detailEmployee(id) {
      const selectedEmployee = this.employees.find(employee => employee.id === id);
      this.$emit('selectEmployee', selectedEmployee);
    }
  }
};
</script>

<style>
.table {
  width: 100%;
  margin-top: 20px;
}
</style>
