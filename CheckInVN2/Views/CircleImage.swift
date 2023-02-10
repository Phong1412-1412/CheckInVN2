//
//  CircleImage.swift
//  CheckInVN2
//
//  Created by PPPP on 23/01/2023.
//

import SwiftUI
struct CircleImage: View {
    @State private var showImageModal = false
    var image: Image
    var body: some View {
        Button(action: {
            self.showImageModal = true
        }) {
            image
                .resizable()
                .frame(width: 250, height: 250, alignment: /*@START_MENU_TOKEN@*/.center/*@END_MENU_TOKEN@*/)
                .clipShape(Circle())
                .overlay(Circle().stroke(Color.yellow, lineWidth: 4))
        }
        .sheet(isPresented: $showImageModal) {
            image
                .resizable()
                .aspectRatio(contentMode: .fit)
        }
        
    }
}

struct CircleImage_Previews: PreviewProvider {
    static var previews: some View {
        CircleImage(image: Image("angiang"))
    }
}
