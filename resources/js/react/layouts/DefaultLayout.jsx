import { Link, Outlet, Navigate } from "react-router-dom";
import { UseStateContext } from "../contexts/ContextProvider";
export default function DefaultLayuot() {
    const { user, token, setUser, setToken } = UseStateContext();
    const onLogout = (ev) => {
        ev.preventDefault();
        console.log('Logout action')
        setUser({});
        setToken(null);
    }
    console.log(user);
    console.log(token);
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