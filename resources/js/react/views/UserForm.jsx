import { useEffect, useState } from "react";
import axiosClient from "../axiosClient";
import { Link } from "react-router-dom";
import { useParams } from "react-router-dom";
import { useNavigate } from "react-router-dom";
import { useRef } from "react";
import { UseStateContext } from "../contexts/ContextProvider";

export default function UserForm() { 
    const { id } = useParams();
    const [user, setUser] = useState({
        id: null,
        name: '',
        user_name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });
    const navigate = useNavigate();
    const [loading, setLoading] = useState(false);
    const [errors, setErrors] = useState();
    const { setNotification } = UseStateContext();

    const nameRef = useRef();
    const userNameRef = useRef();
    const emailRef = useRef();
    const passwordRef = useRef();
    const passwordConfirmationRef = useRef();

    if (id) { 
        useEffect(() => { 
            setLoading(true);
            axiosClient.get(`/users/${id}`)
                .then(({ data }) => { 
                    setUser(data.data);
                    setLoading(false);
                }).catch((er) => { 
                    setLoading(false);
                    console.log('error: ' + err);
                    console.log(err.response.data.errors);
                    setErrors(err.response.data.errors);
                })
        }, []);
    }

    const onSubmit = (ev) => { 
        ev.preventDefault();
        console.log('Save form submit handler');
        if (user.id) {
            axiosClient.put(`/users/${user.id}`, user)
                .then(() => { 
                    setNotification('User was updated');
                    navigate('/react/users')
                }).catch((error) => {
                    console.log('error occurred');
                    console.log(error);
                    console.log(error.response.data.errors);
                    setErrors(error.response.data.errors);
                })
        } else {
            axiosClient.post('/users', user)
                .then(() => {
                    setNotification('User was created');
                    navigate('/react/users')
                }).catch((error) => {
                    console.log('error occurred');
                    console.log(error);
                    console.log(error.response.data.errors);
                    setErrors(error.response.data.errors);
                })
        }
    }
    return (
        <>
            {user.id && <h1>Edit user info for user: {user.name}</h1>}
            {!user.id &&<h1>Create user</h1> }
            <div className="card animated fadeInDown">
                {loading && (
                    <div className="text-center">Loading...</div>
                )}
                {errors && <div className="alert">
                        {Object.keys(errors).map(key => (
                            <p>{errors[key][0]}</p>
                        ))}
                </div>
                }
                {!loading && 
                    <form onSubmit={onSubmit}>
                        <input value={user.name} onChange={ev => setUser({...user, name: ev.target.value }) } ref={nameRef} type="text" placeholder="Full Name" />
                        <input value={ user.user_name}  onChange={ev => setUser({...user, user_name: ev.target.value }) } ref={userNameRef} type="text" placeholder="user name" />
                        <input value={ user.email}  onChange={ev => setUser({...user, email: ev.target.value }) } ref={emailRef} type="email" placeholder="Email"/>
                        <input ref={passwordRef}  onChange={ev => setUser({...user, password: ev.target.value }) } type="password" placeholder="Password" />
                        <input ref={passwordConfirmationRef}  onChange={ev => setUser({...user, password_confirmation: ev.target.value }) } type="password" placeholder="Password Confirmation" />
                        <button className="btn btn-block">Save</button>
                    </form>
                }
            </div>            
        </>
    );
}