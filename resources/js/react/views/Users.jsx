import { useEffect, useState } from "react";
import axiosClient from "../axiosClient";
import { Link } from "react-router-dom";
export default function Users() { 
    const [users, setUsers] = useState([]);
    const [loading, setLoading] = useState([]);
    useEffect(() => { 
        getUsers();
    }, []);

    const getUsers = () => { 
        axiosClient.get('/users').then(({ data }) => { 
            setLoading(false);
            console.log('data users');
            console.log(data);
            setUsers(data.data);
        }).catch((err) => { 
            console.log(err);
            setLoading(false);
        })
    }
    return (
        <div>
            <div style={{display: 'flex', justifyContent: 'space-between', alignItems: 'center'}}>
                <h1>Users</h1>
                <Link to="/users/new" class="btn-add">Add new user</Link>
            </div>
            <div className="cad animated fadeInDown">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Create date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {users.map(u => (
                            <tr>
                                <td>{u.id}</td>
                                <td>{u.user_name}</td>
                                <td>{u.email}</td>
                                <td>{u.created_at}</td>
                                <td>
                                    <Link to={'/users/' + u.id} className="btn-edit">Edit</Link>
                                    <button className="btn-delete">Delete</button>
                                </td>
                            </tr>    
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
    );
}