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
            console.log('data users');
            console.log(data);
            setUsers(data.data);
            setLoading(false);
        }).catch((err) => { 
            console.log(err);
            setLoading(false);
        })
    }

    const onDelete = (u) => {
        if (window.confirm('Delete user?')) {
            return;
        }
        setLoading(true);
        axiosClient.delete(`/users/${u.id}`).then(() => {
            getUsers();
            setLoading(false);
        });
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
                    {loading && <tbody>
                        <tr><td colSpan="5" className='text-center'>
                            Loading...
                        </td></tr>
                    </tbody>
                        }
                    {!loading && <tbody>
                        {users.map(u => (
                            <tr>
                                <td>{u.id}</td>
                                <td>{u.user_name}</td>
                                <td>{u.email}</td>
                                <td>{u.created_at}</td>
                                <td>
                                    <Link to={'/react/users/' + u.id} className="btn-edit">Edit</Link>
                                    &nbsp;
                                    <button onClick={ev => onDelete(u)} className="btn-delete">Delete</button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                    }
                </table>
            </div>
        </div>
    );
}