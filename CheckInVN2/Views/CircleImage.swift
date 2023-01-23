//
//  CircleImage.swift
//  CheckInVN2
//
//  Created by PPPP on 23/01/2023.
//

import SwiftUI

struct CircleImage: View {
    var body: some View {
        Image("angiang")
            .resizable()
            .clipShape(Circle())
            .overlay(Circle().stroke(Color.yellow, lineWidth: 4))
    }
}

struct CircleImage_Previews: PreviewProvider {
    static var previews: some View {
        CircleImage()
    }
}
