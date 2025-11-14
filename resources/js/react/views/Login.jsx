import { Link } from "react-router-dom";
import { useRef } from "react";
import axiosClient from "../axiosClient";
import { UseStateContext } from "../contexts/ContextProvider";
export default function Login() {
    const { setUser, setToken} = UseStateContext();
    const emailRef = useRef();
    const passwordRef = useRef();

    const onSubmit = (ev) => {
        ev.preventDefault();
        console.log('form login submit action');
        const payload = {
            email: emailRef.current.value,
            password: passwordRef.current.value,
        };
        
        (async () => {
            try { 
                const res = await axiosClient.post('/login', {
                    email: payload.email,
                    password: payload.password
                });
                console.log('token ' + res.data.token);
                setUser(res.data.user);
                setToken(res.data.token);
            } catch (error) { 
                console.log('error during login' + error);
            }
        })();
    }
    return (
        <div className="login-signup-form animated fadeInDown">
            <div className="form">
                <form onSubmit={onSubmit}>
                    <h1 className="title">Login int your account</h1>
                    <input ref={emailRef} type="email" placeholder="Email"/>
                    <input ref={passwordRef} type="password" placeholder="Password" />
                    <button className="btn btn-block">Login</button>
                    <p className="message">
                        Not registered? <Link to="/react/signup">Create account</Link>
                    </p>
                </form>
            </div>
        </div>
    );
}