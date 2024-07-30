<template>
      <tr>
          <td>{{ employee.name }}</td>
          <td>{{ employee.email }}</td>
          <td>{{ employee.phone }}</td>
          <td>
            <button class="btn btn-info btn-sm" @click="$emit('detail',employee.id)">Details</button>
          </td>
        </tr>
  </template>
  
  <script>
  export default {
    name: 'EmployeeTable',
    props:['employee']
  };
  </script>
  
  <style>
  .table {
    width: 100%;
    margin-top: 20px;
  }
  </style>
  