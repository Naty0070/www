import React, { Component } from 'react'

export default class Sum extends Component {
    render() {
        
        return (
            <div>
                <hr />
                <p>{this.props.total} ,-Kč</p>
            </div>

        )
    }
}
