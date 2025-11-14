import { Outlet, Navigate } from "react-router-dom";
import { UseStateContext } from "../contexts/ContextProvider";
export default function DefaultLayuot() {
    const { user, token } = UseStateContext();
    if (!token) {
        return <Navigate to="/react/login/"/>
    }

     return (
        <>
            Default Layout
            {/* Child routes will render here */}
            <Outlet />
        </>
    );
}