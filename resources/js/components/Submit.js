import React,{useState} from 'react';
import ReactDOM from 'react-dom';

function SubmitButton() {

    const [click,setClick] = useState(false)

    return (
        <div>
            <button type="submit" className="mt-4 btn btn-outline-dark" onClick={() => setClick(true)}>
                {!click ? (<div>Submit</div>): (
                    <div>
                        <span className="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span className="pl-3">Loading...</span>
                    </div>
                )}
            </button>
        </div>
    );
}

export default SubmitButton;

if (document.getElementById('submit-button')) {
    ReactDOM.render(<SubmitButton />, document.getElementById('submit-button'));
}
