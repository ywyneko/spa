<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue Spa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div id="app" class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" v-model="user.name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" v-model="user.email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" v-model="user.password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary" @click="store">Add User</button>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <tr v-for="user in users" >
                        <td>    @{{user.id}} </td>
                        <td>    @{{user.name}}</td>
                        <td>    @{{user.email}}</td>
                        <td>
                           <button class="btn btn-success btn-sm">Update</button>
                           <button  class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
    </script>
    <script>
        new Vue({
            el : "#app",
            data : {
                users : [],
                user : {
                    name : '',
                    email : '',
                    password : ''
                }
            },
            created(){
                 this.index();
            },
            methods : {
                index(){
                    axios.get('/api/user')
                    .then(res => this.users = res.data.users)
                },
                store(){
                    let user = {
                        name : this.user.name,
                        email : this.user.email,
                        password : this.user.password,
                    }
                    axios.post('/api/user',{
                        name : user.name,
                        email : user.email,
                        password : user.password,
                    })
                    .then(res => {
                        this.index();
                        this.user = {name : '',email: '',password: ''}
                    })
                }
            }
        });
    </script>
</body>
</html>