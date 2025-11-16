import { Link, Outlet, Navigate } from "react-router-dom";
import { UseStateContext } from "../contexts/ContextProvider";
import { useEffect } from "react";
import axiosClient from "../axiosClient";
export default function DefaultLayuot() {
    const { user, token, setUser, setToken } = UseStateContext();
    //Fetch full user on layout load
    // console.log(Object.keys(user));
    console.log(user.id);
    // debugger;
    useEffect(() => {
        if (!user?.id) { 
            console.log('user id is not defined for fetching user data');
            return;
        }
        axiosClient.get(`/users/${user.id}`)
            .then(({ data }) => { 
                console.log('user load');
                console.log(data.data);
                console.log('user load');
                if (data.data.id) {
                    // setUser(data.data);    
                } else {
                    console.error('failed to fetch user data');
                }
                
            }).catch((err) => {
                console.error(err);
            })
        console.log('render useEffect');
    }, []);

    const onLogout = (ev) => {
        ev.preventDefault();
        console.log('Logout action')
        setUser({});
        setToken(null);
    }
    // console.log(user);
    // console.log(token);
    if (!token) {
        return <Navigate to="/react/login/"/>
    }

     return (
         <div id="defaultLayout">
             <aside>
                 <Link to="/react/dashboard">Dashboard</Link>
                 <Link to="/react/users">Users</Link>
             </aside>
             <div className="content">
                 <header>
                     <div>Header</div>
                     <div>
                         User info: {user.user_name}
                         <a className="btn-logout" href="#" onClick={onLogout}>Logout</a>
                         
                     </div>
                 </header>
                 <main>
                     Default Layout
            {/* Child routes will render here */}
            <Outlet />
                 </main>
             </div>
            
        </div>
    );
}