import React,{useState} from 'react';
import ReactDOM from 'react-dom';

function Button() {

    const [click,setClick] = useState(false)

    return (
        <div>
            <button type="submit" className="mt-4 btn btn-outline-dark" onClick={() => setClick(true)}>
                {!click ? (<div>Submit Attendance</div>): (
                    <div>
                        <span className="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span className="pl-3">Loading...</span>
                    </div>
                )}
            </button>
        </div>
    );
}

export default Button;

if (document.getElementById('button-custom')) {
    ReactDOM.render(<Button />, document.getElementById('button-custom'));
}
