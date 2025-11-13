import { Outlet } from "react-router-dom";
export default function DefaultLayuot() {
    return (
        <>
            Default Layout
            {/* Child routes will render here */}
            <Outlet />
        </>
    );
}