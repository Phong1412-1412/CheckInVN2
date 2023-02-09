//
//  CircleImage.swift
//  CheckInVN2
//
//  Created by PPPP on 23/01/2023.
//

import SwiftUI
struct CircleImage: View {
    var image: Image
    var body: some View {
        image
            .resizable()
            .frame(width: 250, height: 250, alignment: /*@START_MENU_TOKEN@*/.center/*@END_MENU_TOKEN@*/)
            .clipShape(Circle())
            .overlay(Circle().stroke(Color.yellow, lineWidth: 4))
    }
}

struct CircleImage_Previews: PreviewProvider {
    static var previews: some View {
        CircleImage(image: Image("angiang"))
    }
}
