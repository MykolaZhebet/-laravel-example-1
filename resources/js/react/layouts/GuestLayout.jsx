import { Outlet, Navigate } from "react-router-dom";
import { UseStateContext } from "../contexts/ContextProvider";
export default function GuestLayuot() {
    const { token } = UseStateContext();
    if (token) { 
        return <Navigate to="/react/" />
    }
    return (
        <>
            Guest Layout
            <div>
                {/* Child routes will render here */}
                <Outlet />
            </div>
        </>
    );
}