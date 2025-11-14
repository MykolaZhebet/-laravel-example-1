import { Link } from "react-router-dom";
import { useRef } from "react";
import axiosClient from "../axiosClient";
import { UseStateContext } from "../contexts/ContextProvider";
export default function Signup() { 
    const nameRef = useRef();
    const emailRef = useRef();
    const passwordRef = useRef();
    const passwordConfirmationRef = useRef();
    
    const {setUser, setToken} = UseStateContext();
    const onSubmit = (ev) => { 
        ev.preventDefault();
        const payload = {
            name: nameRef.current.value,
            email: emailRef.current.value,
            password: passwordRef.current.value,
            password_confirmation: passwordConfirmationRef.current.value,
        }
        console.log(payload);
        axiosClient.post('/api/signup', payload).then(({ data }) => { 
            setUser(data.user);
            setToken(data.token);
        }).catch((err) => {
            console.log('error occurred');
            console.log(err);
            const response = err.response;
            //If there are some validation errors during signup
            if (response && response.status === 422) {
                console.log(response.data.errors);
            }
         })
    }
    return (
        <div className="login-signup-form animated fadeInDown">
            <div className="form">
                <form onSubmit={onSubmit}>
                    <h1 className="title">Create your account</h1>
                    <input ref={nameRef} type="text" placeholder="Full Nama"/>
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