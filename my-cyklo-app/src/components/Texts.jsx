import React, { Component } from 'react'

export default class Texts extends Component {
    
    render() {
        return (
            <div>
                <p>{this.props.count} x {this.props.name}</p>
            </div>
        )
    }
}
