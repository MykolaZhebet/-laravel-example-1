import { Link } from "react-router-dom";
import { useRef } from "react";
import axiosClient from "../axiosClient";
import { useState } from "react";
import { UseStateContext } from "../contexts/ContextProvider";
export default function Signup() { 
    const nameRef = useRef();
    const userNameRef = useRef();
    const emailRef = useRef();
    const passwordRef = useRef();
    const passwordConfirmationRef = useRef();
    const [errors, setErrors] = useState();
    
    const {setUser, setToken} = UseStateContext();
    const onSubmit = (ev) => { 
        ev.preventDefault();
        const payload = {
            name: nameRef.current.value,
            user_name: userNameRef.current.value,
            email: emailRef.current.value,
            password: passwordRef.current.value,
            password_confirmation: passwordConfirmationRef.current.value,
        }
        console.log(payload);
        axiosClient.post('/register', payload).then(({ data }) => { 
            setUser(data.user);
            (async () => {
                const res = await axiosClient.post('/login', {
                    email: payload.email,
                    password: payload.password
                });
                console.log('token ' + res.data.token);
                setToken(res.data.token);
            })();
            
        }).catch((error) => {
            console.log('error occurred');
            console.log(error);
            console.log(error.response.data.errors);
            setErrors(error.response.data.errors);
        })
    }
    return (
        <div className="login-signup-form animated fadeInDown">
            <div className="form">
                <form onSubmit={onSubmit}>
                    <h1 className="title">Create your account</h1>
                    {errors && <div className="alert">
                        {Object.keys(errors).map(key => (
                            <p>{errors[key][0]}</p>
                    ))}
                    </div>
                    }
                    <input ref={nameRef} type="text" placeholder="Full Name" />
                    <input ref={userNameRef} type="text" placeholder="user name" />
                    <input ref={emailRef} type="email" placeholder="Email"/>
                    <input ref={passwordRef} type="password" placeholder="Password" />
                    <input ref={passwordConfirmationRef} type="password" placeholder="Password Confirmation" />
                    <button className="btn btn-block">Sign up</button>
                    <p className="message">
                        Already registered? <Link to="/react/login">Sgin in</Link>
                    </p>
                </form>
            </div>
        </div>
    )
}